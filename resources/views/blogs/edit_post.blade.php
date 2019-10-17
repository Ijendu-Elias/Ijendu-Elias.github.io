@extends('layout')
@section('content')
<div class="container col-md-10">
    <div class="row">
                <p class="alert-success" style="border-radius:3px;">
                    <?php
                    $category=Session::get('category');
                    if($category)
                    echo $category;
                    Session::put('category', null);
                ?>
            </p><!--end of flash message-->
  <h4 class="blog-post-title"><i>Article</h4>  
    </div>


<?php $blog_category_id=Session::get('blog_category_id'); ?>
    <form action="{{URL::to('_post_update',$blog_info->post_id)}}" method="post"  enctype="multipart/form-data">
          {{ csrf_field() }}
              <div class="form-group">
                 <label for="" style="float:right; color:skyblue">Create Post</label>
              </div>
              <div class="form-group">
                <textarea name="post_body" id="" rows="5" >{{$blog_info->post_body}}</textarea><br><br>
                  <input type="text" name="author" id="" value="{{$blog_info->author}}" >
                   <input type="text" name="title" id="" value="{{$blog_info->title}}" ><br><br>
                    <input type="file" id="file-upload" name="post_image" id="" disabled>
                  <img id="display-img" src="" style="width:50%; height:50%" class="rounded">
                <div>
                  <label for="">Select Category</label><br>
                  <select name="blog_category_id">
                  <option>Select Category</option>
                  <?php
                          $all_post_category=DB::table('_tbl_blog_category')
                              ->select('_tbl_blog_category.*')
                              ->get();												
                            foreach($all_post_category as $category){?>
                            <option value="{{$category->blog_category_id}}">{{$category->slug}}</option>
                  <?php }?>
                  </select>
                </div><br>
            <button type="submit" class="btn btn-sm btn-success">Post</button>
          <a href="{{URL::to('/Blogging')}}" class="btn btn-sm btn-default" style="float:right">Cancel</a>
        </div><hr>
      </form>

@endsection