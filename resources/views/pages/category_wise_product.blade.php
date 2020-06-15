@extends('layout')
@section('content')
        <h2 class="title text-center">Products Available</h2>

       <?php foreach ($product_by_category as $view_category_wise){?>

            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to($view_category_wise->product_image)}}" alt="" style="height:200px;" />
                                <h2>N{{$view_category_wise->product_price}}</h2>
                                <p>{{$view_category_wise->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>N{{$view_category_wise->product_price}}</h2>
                                    <p>{{$view_category_wise->product_name}}</p>
                                    <a href="{{URL::to('/view-product/'.$view_category_wise->product_id)}}" class="btn btn-default add-to-cart" style="background:skyblue; color:white;"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{URL::to('/view-product/'.$view_category_wise->product_id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{URL::to('/view-product/'.$view_category_wise->product_id)}}"><i class="fa fa-plus-square" ></i>View products</a></li>                        </ul>
                    </div>
                </div>
            </div>
<?php }?>
            </div><!--features_items--><br><br><br><br>

            <div class="carousel-inner">
            <h5>Products You Could Need</h5>
            <?php
                $all_published_category=DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
                    ->where('tbl_products.publication_status', 1)
                    ->get();
                    foreach($all_published_category as $log){?>

                        <div class="col-sm-2" style="margin-right:12%;">
                       <div class="product-image-wrapper">
                           <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="img-thumbnail" src="{{URL::to($log->product_image)}}" alt="" style=border:2px solid white;" />
                                <h2  style="color:black;">N{{$log->product_price}}</h2>
                                <p>{{$log->product_name}}</p>
                                <a href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay"  style="background:skyblue;">
                                <div class="overlay-content" style="background:skyblue;">
                                    <h2>N{{$log->product_price}}</h2>
                                    <p>{{$log->product_name}}</p>
                                    <a style="background:skyblue" href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress"><i class="fa fa-shopping-cart"  style="color:white" ></i><span style="color:white">Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{URL::to('/view-product/'.$log->product_id)}}"><i class="fa fa-plus-square"></i>View products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
<?php }?>
                </div><!--features_items-->

            @endsection
