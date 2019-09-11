<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use\Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
   
   
    public function index()
    {
        // $this->CustomerAuthCheck();
        //$allproduct_info=DB::table('tbl_category')->get();
        $all_published_product=DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
                    ->where('tbl_products.publication_status', 1)
                    ->get();

        $manage_product=view('pages.home_content')->with('all_published_product',$all_published_product);
        return view('layout')->with('pages.home_content', $manage_product);        
        
        //return view('pages.home_content');
    }


//category_wise function
public function show_category_product_wise($category_id)
{
    
    $product_by_category=DB::table('tbl_products')
    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
    ->where('tbl_category.category_id', $category_id)
    ->where('tbl_category.publication_status',1)
    ->get();

$manage_product_by_category=view('pages.category_wise_product')->with('product_by_category',$product_by_category);
return view('layout')
->with('pages.category_wise_product', $manage_product_by_category);    
    // return view('pages.category_wise_product');
}


public function show_manufacture_product_wise($manufacture_id)
{
    // $this->CustomerAuthCheck();
    $product_by_manufacture=DB::table('tbl_products')
    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
    ->where('manufacture.manufacture_id', $manufacture_id)
    ->where('tbl_category.publication_status',1)
    ->get();

$manage_manufacture=view('pages.manufacture_wise_product')->with('product_by_manufacture',$product_by_manufacture);
return view('layout')
->with('pages.manufacture_wise_product', $manage_manufacture);    
    
    // return view('pages.manufacture_wise_for_product');
}

public function view_product_by_id($product_id)
{

    $product_by_view=DB::table('tbl_products')
    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
    ->where('tbl_products.product_id', $product_id)
    ->where('tbl_category.publication_status',1)
    ->get();

$manage_pro=view('pages.product_detail')->with('product_by_view',$product_by_view);
return view('layout')
->with('pages.product_detail', $manage_pro);
    // return view('pages.product_detail');
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
