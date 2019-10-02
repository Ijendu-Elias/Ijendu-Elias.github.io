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
            'post_date'=>'',
        ]);

        $data=array();
        $data['forum_name']=$request->forum_name;
        $data['forum_number']=$request->forum_number;
        $data['forum_body']=$request->forum_body;
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

            public function blog()
            {
                return view('blogs.blog_post');
            }

            public function add_blog_category()
            {
                return view('blogs.blog_category');
            }

            public function store_blog_category(Request $request)
            {
                $data = array();
                $data['slug']=$request->category_name;
                DB::table('_tbl_blog_category')
                        ->insert($data);
                        if($data){
                        Session::put('category', 'added successfully !!');
                        return Redirect::to('/Blogging'); 
                        }else{
                            Session::put('category', 'Not added successfully !!');
                            return Redirect::to('/_category'); 
                        }
            }

            public function store_blog_post(Request $request)
            {
                $user = DB::table('tbl_customers_registered')
                        ->where('customer_email', Session::get('customer_email'))
                        ->first();


                $data['post_body']=$request->post_body;
                $data['author']=$request->author;
                $data['title']=$request->title;
                $data['blog_category_id']=$request->blog_category_id;
                $data['customer_id']=$user->customer_id;
       
                
                $image=$request->file('post_image');
                if($image){
                    $image_name=str_random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.'.'.$ext;
                    $upload_path='blog_img/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path, $image_full_name);

                    if($success){
                        $data['post_image']=$image_url;
                        DB::table('tbl_posts')->insert($data);
                        Session::put('message','product added successfully');
                        return Redirect::to('/Blogging');
                    }
                    }
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
