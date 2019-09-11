<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use\App\Http\Requests;
use Session;

use\Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.addcategory');
    }

    public function all_category()
    {
        $this->AdminAuthCheck();
        //$allcategory_info=DB::table('tbl_category')->get();
        $allcategory_info=DB::table('tbl_category')
                            ->paginate(10);

         $manage_category=view('admin.allcategory')->with('allcategory_info',$allcategory_info);
         return view('admin_layout')->with('admin.allcategory', $manage_category);

        //  return view('admin.allcategory', compact('allcategory_info'));
    }


    public function save_category(Request $request)
    {
        $this->AdminAuthCheck();

        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Category added successfully !!');
        return Redirect::to('/all_category');
    }

    public function unactive_category($category_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update(['publication_status' => 0 ]);
                Session::put('message', 'Category Unactiveness Activated');
                return Redirect::to('/all_category');
    }

    public function active_category($category_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update(['publication_status' => 1 ]);
                Session::put('message', 'Category activeness Activated');
                return Redirect::to('/all_category');


    }

   


    public function edit_cat($category_id)
    {
        $this->AdminAuthCheck();

        $category_info=DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->first();

                $category_info=view('admin.edit-category')
                ->with('category_info', $category_info);
                 return view('admin_layout')
                 ->with('admin.edit-category', $category_info);


        // return view('admin.edit-category');
    }


    public function update_cat(Request $request, $category_id)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
                Session::get('message','You Updated This Category Successfully');
                return Redirect::to('/all_category');
    }





    public function delete_cat($category_id)
    {
        $this->AdminAuthCheck();
        
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->delete();
            Session::get('message','You Deleted This Category Successfully');
            return Redirect::to('/all_category');
    }


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
