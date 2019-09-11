<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use\App\Http\Requests;
use Session;
use\Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AdminAuthCheck();
     return view('admin.dashboard');  
    }

    public function dashboard(Request $request)
    {   
        $this->AdminAuthCheck();

        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                 ->first();
                  if($result){
                  Session::put('admin_name', $result->admin_name);
                  Session::put('admin_email', $result->admin_email);
                  Session::put('admin_phone', $result->admin_phone);
                  Session::put('admin_id', $result->admin_id);
                  return Redirect::to('/dashboard');
                  }else{
                  Session::put('message','Email or Password Invalid');
                  return Redirect::to('/admin');
                      }
                    //  echo "<pre>";
                    //  print_r($result);
                    //  exit();
        }

        //checking if Admin is login. Authentication
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
