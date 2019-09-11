<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use\App\Http\Requests;
use Session;
use Cart;
use\Illuminate\Support\Facades\Redirect;
session_start();

class testingController extends Controller
{
    public function bussiness_test()
    {
        $this->CustomerAuthCheck();

        return view('pages.quize');
    }



    //validation 
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
