<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use\App\Http\Requests;
use App\Mail\ResetMail;
use App\Mail\VerificationMail;
use Session;
use Cart;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use\Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Paystack;
use RuntimeException;

session_start();

class CheckoutController extends Controller
{
    public function login_page()
    {
        return view('pages.login_check');
    }

    public function checkGoogleCaptcha($rkey)
    {
        $secretKey = '6Ldb9-EUAAAAAL0YZmGTREA-rUEkeYNOcHZOXCKn';
        $responseKey = $rkey;
        $urlIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey$remoteip=$urlIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        return $response;
    }


    public function register(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|min:3|max:32',
            'customer_email' => 'required|email|unique:tbl_customers_registered,customer_email',
            'phone_number' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $data = array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['phone_number']=$request->phone_number;
        $data['suspension']=$request->suspension;
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $customer_id=DB::table('tbl_customers_registered')
                            ->insertGetid($data);
                            Session::put('customer_id', $customer_id);
                            Session::put('customer_email',$request->customer_email);
                            Session::put('customer_name',$request->customer_name);
                            Session::put('phone_number', $request->phone_number);
                            Session::put('message', 'Congratulations! Check Your Email For Varification');
                           return Redirect::to('/checkout');
    }

    public function email_verify(Request $request){
        return view('pages.resend_varification');
    }


    public function email_verify_resend(Request $request)
    {
        $user = DB::table('tbl_customers_registered')
                        ->where('customer_email', Session::get('customer_email'))
                        ->first();
                        $this->sendVerificationMail($user, $user->customer_email);
                        return redirect()->route('email-verify');
    }



    public function email_verification(Request $request, $email)
    {
        try{
            $email = decrypt($email);
        }catch(RuntimeException $ex){
            return redirect('/');
        }

        $user = DB::table('tbl_customers_registered')
                        ->where('customer_email', $email)
                        ->update(['email_verified_at' => now()]);
        return redirect()->route('home')->withMessage('Congratulations! Your Email Has Been Verified Successfully');
    }



    private function sendVerificationMail($user, $email)//send verification mail with compact users
    {
        Mail::to($email)->send(new VerificationMail($user));
    }


    public function checkout_page()
    {
          $this->CustomerAuthCheck();
          return view('pages.checkout_view_page');
    }



    public function shiping_details_store(Request $request)
    {
        $this->CustomerAuthCheck();

        $data = array();
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone_number']=$request->shipping_phone_number;
        $data['shipping_city']=$request->shipping_city;
        $shipping_id = DB::table('tbl_shipping')
                    ->insertGetId($data);
                    Session::put('shipping_id', $shipping_id);
                    return Redirect('/payment');
    }



    public function customer_login(Request $request)
    {

        //    $custommer_id=$request->customer_id;
            $customer_email = $request->customer_email;
            $customer_password = $request->password;
            $google_capcha = $_POST['g-recaptcha-response'];

            $user=DB::table('tbl_customers_registered')
                            ->where('customer_email', $customer_email)
                            ->first();

                            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

                                if($user){
                                    if($user->suspension == 1){
                                       $password_valid = password_verify($customer_password, $user->password);
                                      if($password_valid){
                                          Session::put('customer_id', $user->customer_id);
                                          Session::put('customer_email', $user->customer_email);
                                          Session::put('phone_number', $user->phone_number);
                                          Session::put('customer_name', $user->customer_name);
                                            return redirect('/')->withMessage('Login Successful');
                                      }else{
                                          return redirect()->back()->withMessage('creditial incorrect');
                                   }}else{
                                           return redirect()->back()->withMessage('Sorry you are on suspention incorrect');
                                    }
                                }else{
                                    return redirect()->back()->withMessage('user not registered');

                                     }

                            }else{
                                return redirect()->back()->withMessage('Please Check The Capcha');
                            }


    }



    //for profile as user side
    public function profile()
    {
        $this->CustomerAuthCheck();
        return view('pages.customer_profile');
    }

    public function forget_password()
    {
        return view('pages.forget_password');
    }

    public function send_email_reset(Request $request)
        {
            $user = DB::table('tbl_customers_registered')
            ->where('customer_email', $request->email)
            ->first();
            if($user){
                Mail::to($user->customer_email)->send(new ResetMail($user));
                return redirect()->back()->withSuccess('Reset Mail sent');
            }else {
                return redirect()->back()->withError('Email doesnt exist');
            }
        }

                public function show_reset_password_form(Request $request, $email){
                    try{
                        $email = decrypt($email);
                    }catch(RuntimeException $ex){
                        return redirect('/');
                    }
                    return view('pages.reset_password')
                            ->withEmail($email);
                }

            public function reset_password(Request $request){
                $this->validate($request, [
                    'email' => 'required|email',
                    'password' => 'required|min:8|confirmed',
                ]);
               $user=DB::table('tbl_customers_registered')
                    ->update(['password' => password_hash($request->password, PASSWORD_DEFAULT)]);

                if($user){
                    return redirect()->route('home')->withMessage('Password Updated Successfully');
                }
                else
                {
                    return redirect()->route('home')->withMessage('Password Incorrect');
                }
            }





             public function payment()
            {
                $this->CustomerAuthCheck();
                return view('pages.payment_page');
            }


                //payment gateway function...........Storind them into th data base
            public function order_with_cash(Request $request)
            {
                $this->CustomerAuthCheck();

                $payment_gateway = $request->payment_method;

                $paydata =array();
                $paydata['payment_method']=$payment_gateway;
                $paydata['payment_status']='pending';
                $payment_id=DB::table('tbl_payment')
                        ->insertGetId($paydata);

                $orderdata['customer_id']=Session::get('customer_id');
                $orderdata['shipping_id']=Session::get('shipping_id');
                $orderdata['payment_id']=$payment_id;
                $orderdata['order_total']=Cart::total();
                $orderdata['order_status']='pending';
                $order_id=DB::table('tbl_order')
                            ->insertGetId($orderdata);


                //getting the contents as cart which has its product and price
                $content=Cart::content();

                if($payment_gateway=='handcash'){

                    $order_detaildata=array();
                    foreach($content as $d_content)
                    {
                        $order_detaildata['order_id']=$order_id;
                        $order_detaildata['product_id']=$d_content->id;
                        $order_detaildata['product_name']=$d_content->name;
                        $order_detaildata['product_price']=$d_content->price;
                        $order_detaildata['product_sales_quantity']=$d_content->qty;
                            DB::table('tbl_order_details')
                                    ->insert($order_detaildata);
                    }
                        Cart::destroy();//deleting the cart after notification of contacting...
                        return view('pages.handcash', compact('payment_gateway'));

                    }else{
                        $order_detaildata=array();
                        $order_detaildata['order_id']=$order_id;
                        $order_detaildata['payment_id']=$payment_id;
                        $index = 0;
                        $total_price = 0;

                        foreach($content as $d_content)
                        {


                        $order_detaildata['product'][$index]['id']=$d_content->id;
                        $order_detaildata['product'][$index]['name']=$d_content->name;
                        $order_detaildata['product'][$index]['price']=$d_content->price;
                        $order_detaildata['product'][$index]['sales_quantity']=$d_content->qty;
                        $total_price += doubleval($d_content->price) * intval($d_content->qty);
                        $index++;
                        }

                        $shipping_id=Session::get('shipping_id');
                        $profile_get=DB::table('tbl_shipping')
                                            ->where('shipping_id', $shipping_id)
                                            ->first();

                        $request->metadata = json_encode($order_detaildata);
                        $request->amount = $total_price * 100;// convert to kobo
                        $request->email = $profile_get->shipping_email;
                        $request->reference = Paystack::genTranxRef();
                        $request->key = config('paystack.secretKey');


                    //  dd($request);
                    return Paystack::getAuthorizationUrl()->redirectNow();
                }
            }

            /**
             * Obtain Paystack payment information
             * @return void
             */
            public function handleGatewayCallback(Request $request)
            {
                if(!$request->trxref && !$request->reference)
                    return redirect()->route('home');



                $paymentDetails = Paystack::getPaymentData();
                $order_id = $paymentDetails['data']['metadata']['order_id'];
                $payment_id = $paymentDetails['data']['metadata']['payment_id'];
                $content = $paymentDetails['data']['metadata']['product'];

                $payment =DB::table('tbl_payment')
                    ->where('payment_id',$payment_id)
                    ->first();

                if($payment->payment_data != null)
                    return redirect()->route('home');

                $order_detaildata=array();
                    foreach($content as $d_content)
                    {
                        $order_detaildata['order_id']=$order_id;
                        $order_detaildata['product_id']=$d_content['id'];
                        $order_detaildata['product_name']=$d_content['name'];
                        $order_detaildata['product_price']=$d_content['price'];
                        $order_detaildata['product_sales_quantity']=$d_content['sales_quantity'];

                        DB::table('tbl_order_details')
                                    ->insert($order_detaildata);
                    }

                    //update payment data
                    $paydata =array();
                    $paydata['payment_status']='approved';
                    $paydata['payment_data'] = json_encode($paymentDetails);

                    $payment_id=DB::table('tbl_payment')
                            ->where('payment_id',$payment_id)
                            ->update($paydata);
                            Cart::destroy();//deleting the cart after notification of contacting...
                            return view('pages.payment_confirmation_page');
            }


            //profile edit function
     public function edit_profile($customer_id)
            {
                $profile_info=DB::table('tbl_customers_registered')
                        ->where('customer_id', $customer_id)
                        ->first();

                $profile_info=view('pages.profile_edit_info')
                        ->with('profile_info', $profile_info);
                        return view('layout')
                        ->with('pages.profile_edit_info', $profile_info);

                        // return view('pages.profile_edit_info');
            }




            //Shipping details edit function
            public function edit_shipping($shipping_id)
            {
                $shipping_info=DB::table('tbl_shipping')
                        ->where('shipping_id', $shipping_id)
                        ->first();

                $shipping_info=view('pages.shipping_edit_info')
                        ->with('shipping_info', $shipping_info);
                        return view('layout')
                        ->with('pages.shipping_edit_info', $shipping_info);

                        // return view('pages.shipping_edit_info');
            }

        public function update_customer_profile(Request $request, $customer_id)
        {
                $data = array();
                $data['customer_name']=$request->customer_name;
                // $data['customer_email']=$request->customer_email;
                $data['phone_number']=$request->phone_number;

                DB::table('tbl_customers_registered')
                        ->where('customer_id', $customer_id)
                        ->update($data);
                        Session::get('message','You Updated Your Profile Successfully');
                        return Redirect::to('/profile_view');
        }

        //update customer shipping detils
        public function update_customer_shipping_details(Request $request, $shipping_id)
        {
                $data = array();
                $data['shipping_first_name']=$request->shipping_first_name;
                // $data['shipping_email']=$request->shipping_email;
                $data['shipping_last_name']=$request->shipping_last_name;
                $data['shipping_phone_number']=$request->shipping_phone_number;
                $data['shipping_address']=$request->shipping_address;
                $data['shipping_city']=$request->shipping_city;

                DB::table('tbl_shipping')
                        ->where('shipping_id', $shipping_id)
                        ->update($data);
                        Session::get('message','You Updated Your Shipping Details Successfully');
                        return Redirect::to('/profile_view');
        }

        //updating customer password
        public function preview_page_password($customer_id)
        {
                $this->CustomerAuthCheck();

                $password_info=DB::table('tbl_customers_registered')
                        ->where('customer_id', $customer_id)
                        ->first();

                $password_info=view('pages.password_page')
                        ->with('password_info', $password_info);
                        return view('layout')
                        ->with('pages.password_page', $password_info);
                        // return view('pages.password_page');
        }


        //password update
        public function update_password(Request $request, $customer_id)
        {
                $old_password=$request->password;
                $new_password=$request->new_password;

                $user=DB::table('tbl_customers_registered')
                        ->where('customer_id', $customer_id)
                        ->first();

            if( password_verify($old_password, $user->password) && $new_password){
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                DB::table('tbl_customers_registered')
                            ->where('customer_id', $customer_id)
                            ->update(['password' => $new_password]);
                            return redirect('/profile_view')->withMessage('Password Updated Successfully');
                        }else{
                           return redirect()->back()->withMessage('Password Incorrect');
                        }
        }



        // public function sslapi()
        // {

        // }


    //customer logout function
    public function customer_logout()
    {
                    Session::flush();
                    return Redirect::to('/login_checking');

    }



    // customer login validation and pages view control
    public function CustomerAuthCheck()
    {
                $customer_id=Session::get('customer_id');
                if($customer_id) {
                return;
        }else{
                return Redirect::to('/')->send();
        }
    }


}
