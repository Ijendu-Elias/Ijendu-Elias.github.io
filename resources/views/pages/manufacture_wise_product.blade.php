@extends('layout')
@section('content')
        <h2 class="title text-center">Manufacture Search Result</h2>
       
       <?php foreach ($product_by_manufacture as $log_man){?>

            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to($log_man->product_image)}}" alt="" style="height:200px;" />
                                <h2>N{{$log_man->product_price}}</h2>
                                <p>{{$log_man->product_name}}</p>
                                <a href="{{URL::to('/view-product/'.$log_man->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>N{{$log_man->product_price}}</h2>
                                    <p>{{$log_man->product_name}}</p>
                                    <a href="{{URL::to('/view-product/'.$log_man->product_id)}}" class="btn btn-default add-to-cart" style="background:skyblue; color:white;"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{URL::to('/view-product/'.$log_man->product_id)}}"><i class="fa fa-plus-square"></i>View products</a></li>                        </ul>
                        </ul>
                    </div>
                </div>
            </div>
<?php }?>
            </div><!--features_items-->

            <!--recommended_items-->
            <div class="recommended_items">
            <h2 class="title text-center">Other Related Products</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">	
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend1.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition17</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend2.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition18</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend3.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition19</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">	
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend1.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition20</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend2.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition21</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('frontend/images/home/recommend3.jpg')}}" alt="" />
                                        <h2>N2,000</h2>
                                        <p>Easy Polo Black Edition22</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>			
            </div>
            </div><!--/recommended_items-->

      @endsection