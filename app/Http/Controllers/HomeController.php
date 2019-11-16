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
        //$search=DB::table('tbl_category')->get();
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

// public function search(Request $request)
// {

//     $search=DB::table('tbl_category')
//     ->join('tbl_products','tbl_category.category_id', '=', 'tbl_products.category_id')
//     ->select('tbl_products.*', 'tbl_category.*')
//     ->where('category_name', 'like', "%{$request->search_now}%")
//     ->get();

//     // $search=DB::table('tbl_products')
//     // ->select('tbl_products.*')
//     // ->where('product_name', 'like', "%{$request->search_now}%")
//     // ->get();

//     // dd($search);

//  $manage_search=view('pages.search_page')->with('search',$search);
// return view('pages.search_page')->withProducts($search);


// }


public function search(Request $request)
{
     $search=DB::table('tbl_products')
    ->select('tbl_products.*')
    ->where('product_name', 'like', "%{$request->search_now}%")
    ->get();
$manage_search=view('pages.search_page')->with('search',$search);
return view('pages.search_page')->withProducts($search);


}

public function store_users_products(Request $request)
{
        $user = DB::table('tbl_customers_registered')
                        ->where('customer_email', Session::get('customer_email'))
                        ->first();

    $data['users_product_name']=$request->users_product_name;
    $data['users_seller_name']=$request->users_seller_name;
    $data['users_seller_phone']=$request->users_seller_phone;
    $data['users_product_description']=$request->users_product_description;
    $data['customer_id']=$user->customer_id;
    
    
    $image=$request->file('users_image_back');
    if($image){
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        // mkdir(realpath('users_sales_img/') . "/" . $image_name[0] . "/" . $image_name[1] . "/" . $image_name[2],0777);
        $upload_path= realpath('users_sales_img/') . "/" . $image_name[0] . "/" . $image_name[1] . "/" . $image_name[2] . "/";
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path, $image_full_name);

        if($success){
            $data['users_image_front']=$image_url;
            DB::table('tbl_users_upload')
                    ->insert($data);
            Session::put('message','Image Product added by You successfully');
            return Redirect::to('/');
        }
        }

}

public function Register_and_sell_product()
{
    return view('pages.Sell_Product_page');
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
