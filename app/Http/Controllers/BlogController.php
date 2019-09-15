<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use\App\Http\Requests;
use Session;
use Cart;
use\Illuminate\Support\Facades\Redirect;
session_start();

class BlogController extends Controller
{
    public function comment_now()
    {
        $this->CustomerAuthCheck();

        $get_article=DB::table('tbl_comments')
                            ->get();

         $manage_article=view('blogs.chat_forum')->with('get_article',$get_article);
         return view('layout')->with('blogs.chat_forum', $manage_article);
        // return view('blogs.chat_forum');
    }



    public function save(Request $request)
    {
        $this->CustomerAuthCheck();

        $this->validate($request,[
            'forum_number'=>'required|unique:tbl_comments|max:11',
            'forum_name' =>'required|max:15',
            'forum_body' =>'required|max:500',
            'post_date'=>'required',
        ]);

        // if ($validator->fails()) {
        //     return redirect('chatting_forum')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $data=array();
        $data['forum_name']=$request->forum_name;
        $data['forum_number']=$request->forum_number;
        $data['forum_body']=$request->forum_body;
        $data['post_date']=$request->post_date;
        DB::table('tbl_comments')
            ->insert($data);
        Session::put('posted', 'posted successfully !!');
        return Redirect::to('/chatting_forum');
    }

    public function reply_back (Request $request)
    {
        $data=array();
        $data['reply_body']=$request->reply_body;
        DB::table('tbl_forum_reply')
                ->insert($data);
                Session::put('mess', 'posted successfully !!');
                return Redirect::to('/chatting_forum');


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
