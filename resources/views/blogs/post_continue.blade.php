@extends('layout')
@section('content')
<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      Blog Post Continues....
    </h3>
    <?php $customer_id=Session::get('customer_id'); ?>
    <?php $blog_category_id=Session::get('blog_category_id'); ?>
    <div class="blog-post">
        <?php												
                        foreach($post_by_continue as $post){?>
                  On: &nbsp; {{$post->slug}}<br>

                  Title: &nbsp; <code>{{$post->title}}</code><br>
                  <span style="color:skyblue">Post:</span> &nbsp; <div align="justify">{{$post->post_body}} </div><br>
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

@endsection