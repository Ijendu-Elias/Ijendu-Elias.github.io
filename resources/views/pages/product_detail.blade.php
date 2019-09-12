@extends('layout')
@section('content')
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                
    <?php foreach ($product_by_view as $product_detail){?>  
                <img src="{{URL::to($product_detail->product_image)}}" style="width:250px;" alt="" />
                
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                
                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                        </div>
                        <div class="item">
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                        </div>
                        <div class="item">
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                          <a href=""><img src="{{URL::to('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                        </div>
                        
                    </div>

                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div>

        </div>
        <div class="col-sm-7">
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
                         <input type="text" name="qty" value="1" />
                         <input type="hidden" name="product_id" value="{{$product_detail->product_id}}">
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                    Add Cart
                            </button>
                </form>
                </span>
                <p>Product Condition:<b>Good<i class="fa fa-thumbs-up"></i></p>
                <p>{{$product_detail->category_name}}</p>
                <p>L.DESC:{{$product_detail->product_long_description}}</p>
                <p>Manufacturer:{{$product_detail->manufacture_name}}</p>
                
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">About The Products</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Manufacturer</a></li>
                <li><a href="#tag" data-toggle="tab">Price Fix 
                    </a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Admin Remarks</a></li>
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
                
                
                
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('frontend/images/home/gallery4.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
     <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>Ijendu Elias</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>4:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>This website is cool and 100% secure......very fast in delivery system</p>
                    <marquee><i><b>Write to Admin On Special Product Request</i></p></marquee>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
@endsection