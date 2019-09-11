<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use\App\Http\Requests;
use Session;
use\Illuminate\Support\Facades\Redirect;

session_start();

class ManufactureController extends Controller
{
    public function index()
    {
        return view('admin.addmanufacture');
    }



    public function save_manufacture(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
        DB::table('manufacture')->insert($data);
        Session::put('message', 'Manufacture added successfully !!');
        return Redirect::to('/allmanufacture');
    }

    public function all_manufacture()
    {
         $this->AdminAuthCheck();
        //$allmanufacture_info=DB::table('manufacture')->get();
        $allmanufacture_info=DB::table('manufacture')->paginate(10);
         $manage_managage=view('admin.allmanufacture')->with('allmanufacture_info',$allmanufacture_info);
         return view('admin_layout')->with('admin.allmanufacture', $manage_managage);

        //  return view('admin.allmanufacture', compact('allmanufacture_info'));
    }



    public function delete_manu($manufacture_id)
    {
        $this->AdminAuthCheck();
        DB::table('manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->delete();
            Session::get('message','You Deleted This Manufacture Successfully');
            return Redirect::to('/allmanufacture');
    }



    public function unactive_manufacture($manufacture_id)
    {
        $this->AdminAuthCheck();
        DB::table('manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->update(['publication_status' => 0 ]);
                Session::put('message', 'Manufacture Unactiveness Activated Sucessfully');
                return Redirect::to('/allmanufacture');
    }



    public function active_manufacture($manufacture_id)
    {
        $this->AdminAuthCheck();
        DB::table('manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->update(['publication_status' => 1 ]);
                Session::put('message', 'Manufacture unactiveness Deactivated Sucessfully');
                return Redirect::to('/allmanufacture');


    }



    public function edit_manufacture($manufacture_id)
    {
        $this->AdminAuthCheck();
        $manufacture_info=DB::table('manufacture')
                ->where('manufacture_id', $manufacture_id)
                ->first();

                $manufacture_info=view('admin.edit-manufacture')
                ->with('manufacture_info', $manufacture_info);
                 return view('admin_layout')
                 ->with('admin.edit-manufacture', $manufacture_info);
        // return view('admin.edit-manufacture');
    }


    
    public function update_manufacture(Request $request, $manufacture_id)
    {
         $this->AdminAuthCheck();
        $data = array();
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;

        DB::table('manufacture')
                ->where('manufacture_id', $manufacture_id)
                ->update($data);
                Session::get('message','You Updated This Manufacture Successfully');
                return Redirect::to('/allmanufacture');
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
