<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use\App\Http\Requests;
use Session;
use\Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function index()
    {
        //adding product into database
        $this->AdminAuthCheck();
        return view('admin.addproduct');
    }


    public function save_product(Request $request)
    {
        //saving all product in to database
        $this->AdminAuthCheck();

       $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['manufacture_id']=$request->manufacture_id;
       $data['product_short_description']=$request->product_short_description;
       $data['product_long_description']=$request->product_short_description;
       $data['product_price']=$request->product_price;
       $data['product_size']=$request->product_size;
       $data['product_color']=$request->product_color;
       $data['publication_status']=$request->publication_status;

       $image=$request->file('product_image');
       if($image){
           $image_name=str_random(20);
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='image/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path, $image_full_name);

           if($success){
            $data['product_image']=$image_url;
            DB::table('tbl_products')->insert($data);
            Session::put('message','product added successfully');
            return Redirect::to('/all_product');
           }
        }

        //adding product without an image
        $data['product_image']=$image_url;
            DB::table('tbl_products')
                    ->insert($data);
            Session::put('message','product added successfully without image');
            return Redirect::to('/all_product');


    }

    public function show_product()
    {
        //displaying product function
        $this->AdminAuthCheck();
        //$allproduct_info=DB::table('tbl_category')->get();
        $allproduct_info=DB::table('tbl_products')
                                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                                    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
                                    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
                                    ->paginate(10);

                        $manage_product=view('admin.all-product')->with('allproduct_info',$allproduct_info);
                        return view('admin_layout')->with('admin.all-product', $manage_product);

                        //  return view('admin.all-product', compact('allproduct_info'));
    }

    public function active_product($product_id)
    {
        $this->AdminAuthCheck();
        //activating product function
        DB::table('tbl_products')
                ->where('product_id',$product_id)
                ->update(['publication_status' => 1 ]);
                Session::put('message', 'products activeness Activated');
                return Redirect::to('/all_product');


    }

    public function unactive_product($product_id)
    {
        $this->AdminAuthCheck();
        //deactivating function of product
        DB::table('tbl_products')
                ->where('product_id',$product_id)
                ->update(['publication_status' => 0 ]);
                Session::put('message', 'products deactiveness Activated');
                return Redirect::to('/all_product');


    }

    public function delete_pro($product_id)
    {
        //delete product function
        $this->AdminAuthCheck();
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
            Session::get('message','Deleted Product Successfully');
            return Redirect::to('/all_product');
    }

    public function edit_pro($product_id)
    {
        $this->AdminAuthCheck();
        //editing product function
        $product_info=DB::table('tbl_products')
                ->where('product_id', $product_id)
                ->first();

                $product_info=view('admin.editproduct')
                ->with('product_info', $product_info);
                 return view('admin_layout')
                 ->with('admin.editproduct', $product_info);

    }

    //updating product
    public function update_pro(Request $request, $product_id)
    {
        $this->AdminAuthCheck();
        
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_short_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
 
        $image=$request->file('product_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
 
            if($success){
             $data['product_image']=$image_url;
             DB::table('tbl_products')
             ->where('product_id', $product_id)
             ->update($data);
             Session::put('message','product updated successfully');
             return Redirect::to('/all_product');
            }
         }
 
         //adding product without an image
         $data['product_image']=$image_url;
             DB::table('tbl_products')
             ->where('product_id', $product_id)
                     ->update($data);
             Session::put('message','product Updated successfully without image');
             return Redirect::to('/all_product');
        // $this->AdminAuthCheck();
    }


    public function manage_order()
    {
        $this->AdminAuthCheck();
        $all_order_info=DB::table('tbl_order')
                            ->join('tbl_customers_registered','tbl_order.customer_id','=','tbl_customers_registered.customer_id')
                            ->select('tbl_order.*','tbl_customers_registered.customer_name')
                            ->paginate(3);

                        $manage_order=view('admin.manage_order')->with('all_order_info',$all_order_info);
                        return view('admin_layout')->with('admin.manage_order', $manage_order);

    }



    public function view_order($order_id){
        
         $this->AdminAuthCheck();
        $order_by_id=DB::table('tbl_order')
                            ->join('tbl_customers_registered','tbl_order.customer_id','=','tbl_customers_registered.customer_id')
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
                            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_customers_registered.*', 'tbl_payment.*')
                            ->where('tbl_order.order_id', $order_id)
                            ->get();

        $view_order_pro=view('admin.view_order')
                        ->with('order_by_id', $order_by_id);
                        return view('Admin_layout')
                                ->with('admin.view_order', $view_order_pro);

        //                             // echo "<pre>";
        //                             // print_r($view_order_info);
        //                             // echo "</pre>";
                                    

        //                 $manage_view_order=view('admin.view_order')->with('view_order_info',$view_order_info);
        //                 return view('admin_layout')->with('admin.view_order', $manage_view_order);        
        // return view('admin.view_order');
    }



    //admin login check function for product 

    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id) {
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }


}
