<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use\App\Http\Requests;
use Session;
use\Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
    public function slide()
    {
        //dding slider function
        $this->AdminAuthCheck();
        return view('admin.addslider');
    }


    public function all_slide()
    {
        //displaying slide slide function
        $this->AdminAuthCheck();

        $allslider_info=DB::table('tbl_slider')->paginate(10);
        $manage_slider=view('admin.allslider')->with('allslider_info',$allslider_info);
        return view('admin_layout')->with('admin.allslider', $manage_slider);

        // return view('admin.allslider');
    }


    public function save_slide(Request $request)
    {
        //saving all slide in to database function
        $this->AdminAuthCheck();

        $data=array();
        $data['publication_status']=$request->publication_status;
        $image=$request->file('slider_image');
       if($image){
           $image_name=str_random(20);
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='slider/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path, $image_full_name);
           if($success){
            $data['slider_image']=$image_url;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slide added successfully');
            return Redirect::to('/add_slider');
           }
        }

        //adding product without an image 
        $data['slider_image']=$image_url;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slide added successfully without image');
            return Redirect::to('/add_slider');


    }



    public function active_slider($slider_id)
    {
        //activating image slide function

         $this->AdminAuthCheck();

        DB::table('tbl_slider')
                ->where('slider_id',$slider_id)
                ->update(['publication_status' => 1 ]);
                Session::put('message', 'Slider in the Userside activeness Activated');
                return Redirect::to('/all_slider');


    }



    public function unactive_slider($slider_id)
    {
        //deactivating image slide function
        $this->AdminAuthCheck();
        DB::table('tbl_slider')
                ->where('slider_id',$slider_id)
                ->update(['publication_status' => 0 ]);
                Session::put('message', 'Slider in the userside deactiveness Activated');
                return Redirect::to('/all_slider');


    }



    public function delete_slider($slider_id)
    {
        //deleting all product in to database function
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->delete();
            Session::get('message','Deleted UserSide Slider Successfully');
            return Redirect::to('/all_slider');
    }

    //admin login check function
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

