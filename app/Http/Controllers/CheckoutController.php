<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use\App\Http\Requests;
use Session;
use Cart;
use\Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_page()
    {
        return view('pages.login_check');
    }


    public function register(Request $request)
    {

        $data = array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['phone_number']=$request->phone_number;
        $data['password'] = md5($request->password);

        $customer_id=DB::table('tbl_customers_registered')
                            ->insertGetid($data);

                            Session::put('customer_id', $customer_id);
                            Session::put('customer_email',$request->customer_email);
                            Session::put('phone_number', $request->phone_number);
                           return Redirect::to('/checkout');

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
            $password =md5($request->password);
            $result=DB::table('tbl_customers_registered')
                            ->where('customer_email', $customer_email)
                            ->where('password',$password)
                            ->first();
                            if($result){
                                Session::put('customer_id',$result->customer_id);
                                Session::put('customer_email',$result->customer_email);
                                Session::put('phone_number',$result->phone_number);
                                Session::put('message','Login successfully');
                                return Redirect::to('/checkout');
                            }else{
                                Session::put('message', 'Email and Password Incorrect');
                                return Redirect::to('/login_checking');
                            }

                        }

    //for profile as user side
    public function profile()
    {
        $this->CustomerAuthCheck();
        return view('pages.customer_profile');
    }

            public function payment()
        {
            $this->CustomerAuthCheck();
            return view('pages.payment_page');             
        }
        

            //payment gateway function...........
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

            if($payment_gateway=='handcash'){
                Cart::destroy();//deleting the cart after notification of contacting...
                return view('pages.handcash', compact('payment_gateway'));
                

            }elseif($payment_gateway=='cart'){
                echo "cart";


            }elseif($payment_gateway=='mastercard'){

                echo "Successfully with mastercard";


            }elseif($payment_gateway=='bitcoin'){
                echo "Successfully with bitcoin";


            }elseif($payment_gateway=='paypal'){
                echo "Successfully with paypal";


            }elseif($payment_gateway=='amex'){
                echo "Successfully with amex";


            }else{
                echo "Payment method Not selected";

            }

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
            return Redirect::to('/payment');
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
                                ->where('customer_id', $customer_id)->first();

            if( md5($old_password) == $user->password && $new_password)
            {
                $new_password = md5($new_password);
                DB::table('tbl_customers_registered')
                                ->where('customer_id', $customer_id)
                                ->update(['password' => $new_password]);

                return redirect()->back()->withMessage('Password Updated Successfully');
            }
            else
            {    
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
        return Redirect::to('/');
        
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
