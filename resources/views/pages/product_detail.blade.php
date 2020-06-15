@extends('layout')
@section('content')
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product bounceInLeft">
              <?php foreach ($product_by_view as $product_detail){?>
                <img src="{{URL::to($product_detail->product_image)}}"  alt="" />
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
            </div>
        </div>
        <div class="col-sm-7 bounceInRight">
            <div class="product-information"><!--/product-information-->
                    <img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                    <h1>{{$product_detail->product_name}}</h1>
                    <p>{{$product_detail->product_color}}</p>
                    <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
                    <span>
                    <span>{{$product_detail->product_price}}</span>

            <form action="{{URL::to('/add_cart')}}" method="POST">
                    {{ csrf_field()}}
                    <label>Quantity:</label>
                      <div class="mb-5">
                          <div class="input-group mb-3" style="max-width: 120px;">
                         <div class="input-group-prepend">
                           <button class="btn btn-outline-primary js-btn-minus" type="button" style="margin-bottom:0px;">&minus;</button>
                           </div>
                             <input type="text" class="form-control text-center"name="qty" value="1" />
                             <div class="input-group-append">
                              <button class="btn btn-outline-primary js-btn-plus" type="button" style="margin-top:0px">&plus;</button>
                               </div>
                              <input type="hidden" name="product_id" value="{{$product_detail->product_id}}">
                               <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                    Add Cart
                               </button>
                             </div>
                          </div>
                    </form>
                  </span>
                <p>Product Condition:<b>Good<i class="fa fa-thumbs-up"></i></p>
                <p>{{$product_detail->category_name}}</p>
                <p>L.DESC:{{$product_detail->product_long_description}}</p>
                <p>Manufacturer:{{$product_detail->manufacture_name}}</p>

            </div><!--/product-information-->
        </div>

     <?php }?>

    </div><!--/product-details-->
    <div class="category-tab shop-details-tab bounceInLeft"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">About The Products</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Manufacturer</a></li>
                <li><a href="#tag" data-toggle="tab">Price Fix
                    </a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Special Order</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <p style="color:orange" >Product Name:<span style="color:black; font-weight:bolder">{{$product_detail->product_name}}</p>
                                <p style="color:orange">Product Price:<span style="color:black; font-weight:bolder">{{$product_detail->product_price}}</p>
                                <p style="color:orange">Product Size:<span style="color:black; font-weight:bolder">{{$product_detail->product_size}}</p>
                                <p style="color:orange">Product Color:<span style="color:black; font-weight:bolder">{{$product_detail->product_color}}</p>
                                <p style="color:orange">Category:<span style="color:black; font-weight:bolder">{{$product_detail->category_name}}</p>
                                <p style="color:orange">Company :<span style="color:black; font-weight:bolder">{{$product_detail->manufacture_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('images/home/gallery1.jpg')}}" alt="" />
                                <h2>{{$product_detail->manufacture_name}}</h2>
                                <p>write Note about them using the id you received from the input function</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
               </div>

            <div class="tab-pane fade" id="tag" >




            </div>

            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>Ijendu Elias</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>4:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>This website is cool and 100% secure......very fast in delivery system</p>
                    <marquee><i><b>Special Product Request</i></p></marquee>

                    <form action="{{URL::to('/Special_Request')}}" method="POST">
                    {{csrf_field ()}}
                        <div class="form-group-row">
                            <input type="hidden" placeholder="Your Name" class="" style="width:50%; height:40px; border-radius:2px;"/>
                            </div>
                            <div class="form-group-row">
                            <input type="hidden" placeholder="Your Email"  style="width:100%;  height:40px; border-radius:2px"/>
                            </div>
                            <div class="form-group">
                            <input type="hidden" placeholder="Your Phone Number"   style="width:100%;  height:40px; border-radius:2px" />
                            </div>
                            <div class="form-group">
                            <textarea name="" placeholder="Address....." style="border-radius:2px"></textarea>
                        </div>
                        <textarea name="" placeholder="Product Type On Special Request"></textarea>
                        <b>Rating: </b> <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->
    <div class="carousel-inner" >
            <h5>Related Products Availables</h5>
            <?php
                $all_published_category=DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','manufacture.manufacture_name')
                    ->where('tbl_products.publication_status', 1)
                    ->get();
                    foreach($all_published_category as $log){?>

                        <div class="col-sm-3">
                       <div class="product-image-wrapper">
                           <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="img-thumbnail" src="{{URL::to($log->product_image)}}" alt="" style="height:200px; border:2px solid gray; width:30%; height:30%;" />
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
