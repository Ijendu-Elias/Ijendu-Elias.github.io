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
                     $all_post=DB::table('tbl_posts')
                              ->join('_tbl_blog_category', 'tbl_posts.blog_category_id','=','_tbl_blog_category.blog_category_id')
                              ->select('tbl_posts.*', '_tbl_blog_category.*')
                              ->get();															
                            foreach($all_post as $post){?>
                      On: &nbsp; {{$post->slug}}<br>

                      Title: &nbsp; <code>{{$post->title}}</code><br>
                      <span style="color:skyblue">Post:</span> &nbsp; <div align="justify">{{$post->post_body}} </div><br>
                      <span style="color:skyblue">By:</span> &nbsp; <code>{{$post->author}}</code><br>
                        <span style="color:skyblue">Date:</span> &nbsp;  &nbsp; <code>{{$post->blog_date}}</code>
                      <img src="{{$post->post_image}}" class="img-circle" style="width:50px; height:50px;"><br>
                      <?php if($customer_id == $post->customer_id){?>
                      <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{URL::to('/delete-post/'.$post->post_id)}}" class="btn btn-sm btn-danger">Delete</a><br><br><br><br>
                      <?php } ?>
            <?php } ?>
         
        </div><!-- /.blog-post --><hr>
  
        <!-- /.blog-post -->
  
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
      <?php if($customer_id!= NULL){?>
            <form action="{{URL::to('_post')}}" method="post"  enctype="multipart/form-data">
                  {{ csrf_field() }}
                      <div class="form-group">
                         <label for="" style="float:right; color:skyblue">Create Post</label>
                      </div>
                      <div class="form-group">
                        <textarea name="post_body" id="" rows="5" placeholder="...Enter Text" required ></textarea><br><br>
                          <input type="text" name="author" id="" placeholder="Eg Ijendu Elias" required>
                           <input type="text" name="title" id="" placeholder="E.g Government Policy" required><br><br>
                            <input type="file" id="file-upload" name="post_image" id="">
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
          <?php } ?>

          <script>
            $(document).on('ready', function(){
                $('#file-upload').on('change', function(e){
                let element = $(this);
                let file = element[0].files[0];

                let fileReader = new FileReader(file);
                fileReader.readAsDataURL(file)

                fileReader.onload = (e) => {
                  $('#display-img').attr('src', e.target.result);
                };
            })
            });
           
          </script>


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
                            <li><a href="#">{{$category->slug}}</a></li>
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