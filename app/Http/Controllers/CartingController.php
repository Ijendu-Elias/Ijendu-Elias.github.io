<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use\Illuminate\Support\Facades\Redirect;
class CartingController extends Controller
{
    public function add_to_carting(Request $request)
    {
        $qty=$request->qty;
        $product_id=$request->product_id;
        $add_cart=DB::table('tbl_products')
                        ->where('product_id',$product_id)
                        ->first();
        $data['qty'] = $qty;
        $data['id']  = $add_cart->product_id;
        $data['name']  = $add_cart->product_name;
        $data['price']  = $add_cart->product_price;
        $data['options']['image']  = $add_cart->product_image;
         
        Cart::add($data);
        return Redirect::to('/display_product_page');
        //  return view('pages.add_to_cart');
    }

    public function display_product_page()
    {
        $all_published_category=DB::table('tbl_products')
                                ->where('publication_status', 1)
                                ->get();

        $manage_category=view('pages.add_to_cart')->with('all_published_category',$all_published_category);
        return view('layout')
        ->with('pages.add_to_cart', $manage_category);   
    }

    //deleting cart items we use update();
    public function delete_cart_item($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/display_product_page');
    }


    public function update_cart(Request $request)
        {
                $qty = $request->qty;
                $rowId=$request->rowId;
                
                Cart::update($rowId,$qty);
                return Redirect::to('/display_product_page');
                
        }    


}
