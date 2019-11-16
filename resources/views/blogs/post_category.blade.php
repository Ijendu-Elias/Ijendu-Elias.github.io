@extends('layout')
@section('content')
<main role="main" class="container col-sm-12">
    <div class="row" style="background:GRAY">

      <?php $customer_id=Session::get('customer_id'); ?>
      <?php $blog_category_id=Session::get('blog_category_id'); ?>

      <?php if($customer_id!= NULL){?>
      <a class="btn btn-sm  btn-warning"href="{{URL::to('/Blogging')}}" style="float:right; border-radius:20px; color:red; font-weight:bolder">READ POST</a>
        <a class="btn btn-sm btn-info"href="{{('/add_category')}}" style="float:right; color:red; border-radius:20px; font-weight:bolder">ADD CATEGORY</a>
        <a class="btn btn-sm  btn-success" href="#" style="float:left; color:red; border-radius:20px; font-weight:bolder">CREATE POST</a>
      <?php } ?>

      </div>
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          BLOG POST
        </h3>
  
        <div class="blog-post">
            <?php												
                            foreach($post_by_category as $post){?>
                      On: &nbsp; {{$post->slug}}<br>

                      Title: &nbsp; <code>{{$post->title}}</code><br>
                      <span style="color:skyblue">Post:</span> &nbsp; <div align="justify">{{str_limit($post->post_body, 300)}} </div><br>
                      <span style="color:skyblue">By:</span> &nbsp; <code>{{$post->author}}</code><br>
                        <span style="color:skyblue">Date:</span> &nbsp;  &nbsp; <code>{{$post->blog_date}}</code>
                      <?php if($customer_id == $post->customer_id){?>
                      <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{URL::to('/delete-post/'.$post->post_id)}}" class="btn btn-sm btn-danger">Delete</a><br><br><br><br>
                      <?php } ?>
            <?php } ?>
         
        </div><!-- /.blog-post --><hr>
  
        <!-- /.blog-post -->
  
        <div class="container col-md-10">
            <div class="row">

            </div>

        </div><!-- /.blog-post -->  
      </div><!-- /.blog-main -->
      <aside class="col-md-4 blog-sidebar">
        <div class="p-4 mb-3 bg-light rounded">
        <div class="p-4">
          <h4 class="font-italic" style="color:red">Categories</h4>
          <ol class="list-unstyled mb-0" >
              <?php
                    $all_post_category=DB::table('_tbl_blog_category')
                                ->select('_tbl_blog_category.*')
                                ->get();															
                              foreach($all_post_category as $category){?>
                            <li><a href="{{URL::to('/get_post_by_category/'.$category->blog_category_id)}}">{{$category->slug}}</a></li>
              <?php }?>
          </ol>
        </div>
        <div class="p-4">
          <h4 class="font-italic" style="color:red">Live</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </aside><!-- /.blog-sidebar -->
    </div>
    </div><!-- /.row -->
  </main><!-- /.container -->


@endsection