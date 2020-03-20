<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Bukatan</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script><!--ggogle catcha api-->

    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.cropit.js')}}"></script><!--cropper.js-->
</head><!--/head-->

<style type="text/css">
.paymentWrap {
	padding: 50px;
}

.paymentWrap .paymentBtnGroup {
	max-width: 800px;
	margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
	padding: 40px;
	box-shadow: none;
	position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
	outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
	border-color: #4cd264;
	outline: none !important;
	box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
	position: absolute;
	right: 3px;
	top: 3px;
	bottom: 3px;
	left: 3px;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	border: 2px solid transparent;
	transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
	background-image: url("/payment_photo/visa.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
	background-image: url("/payment_photo/mastercard.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
	background-image: url("/payment_photo/amex.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.handcash {
	background-image: url("/payment_photo/handcash.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.bitcoin {
	background-image: url("/payment_photo/bitcoin.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method.paypal {
	background-image: url("/payment_photo/papal.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
	border-color: #4cd264;
	outline: none !important;
}
</style>


<!--Crop-it js files for backgroup and rotation-->
<style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .cropit-preview-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        /* Use relative position to prevent from being covered by image background */
        position: relative;
        z-index: 10;
        display: block;
      }

      button {
        margin-top: 10px;
      }
	</style>
	
	<!--Crop-it js files for form and rotation-->
<style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
        margin-top: 10px;
        width: 900px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
      }
    </style>


<body>
<!-- Preloader -->
<div id="preloader">
    <div class="dorne-load"></div>
</div>
	<header id="header"><!--header-->
		<marquee behavior="scroll" direction=""><p class="alert-info" style="border-radius:8px;">
				<?php
				   $message=Session::get('message');				
				   if($message)
					echo $message;
					Session::put('message', null);
					
				?>
		</p></marquee>
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
				
							<ul class="nav nav-pills">
							<li><a href="{{URL::to('/profile_view')}}"><b class="fa fa-envelope"> {{ Session::get('customer_email') }} &nbsp;  <span style="color:orange">|</span>&nbsp;<b class="fa fa-phone"></b>{{ Session::get('phone_number') }} </b></a></li>
								<li><a href="{{URL::to('/profile_view')}}"><i class="fa fa-user"></i>{{ Session::get('customer_name') }}</a></li>
						</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/')}}"><img src="{{URL::to('frontend/images/home/552.gif')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Country
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="{{URL::to('/')}}">America</a></li>
									<li><a href="{{URL::to('/')}}">Nigeria</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Currency
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
										<?php $customer_id=Session::get('customer_id'); ?>	

										<?php if($customer_id!= NULL){?>
											<li><a href ="{{URL::to('/payment')}}">Dollar</a></li>
											<li><a href="{{URL::to('/payment')}}">Naira</a></li>
										<?php }?>	
									
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
								<!--logout alert flash message-->
								<p class="alert-success" style="border-radius:3px;">
										<?php
										$message=Session::get('message');
										if($message)
										 echo $message;
										 Session::put('message', null);
									 ?>
								 </p><!--end of flash message-->
								
							<ul class="nav navbar-nav">
								
								<li><a href="{{URL::to('/display_product_page')}}"><i class="fa fa-star"></i> Wishlist</a></li>
								
							<?php $customer_id=Session::get('customer_id'); 
									$shipping_id=Session::get('shipping_id');
							//  print_r($customer_id);	
							//  print_r($shipping_id);	
							?>		
							

						   <?php if($customer_id!= NULL && $shipping_id==NULL){?>
							<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						   <?php }if($customer_id!= NULL && $shipping_id!=NULL){?>
							<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						   <?php }else{?>
						   <li><a href="{{URL::to('/login_checking')}}"> Checkout</a></li>
						   <?php }?>	
								
							
							<li><a href="{{URL::to('/display_product_page')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

						
						
							<?php $customer_id=Session::get('customer_id'); ?>
													
							<?php if($customer_id != NULL){?>
								<li><a href="{{URL::to('/profile_view')}}"><i class="fa fa-gear"></i> Account Settings</a></li>
								<li><a class="customer_log_out" href="{{URL::to('customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
								
							<?php }else{?>
								<li><a href="{{URL::to('/login_checking')}}"><i class="fa fa-lock"></i> Login</a></li>
							<?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/')}}" class="active"><i class="fa fa-home" style="font-size:150%; color:black;"></i></a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
								<?php $customer_id=Session::get('customer_id'); ?>
								<?php if($customer_id!= NULL){?>	
										<li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li>
								<?php } ?> 
										<li><a href="{{URL::to('/display_product_page')}}">Cart</a></li> 
										{{-- <li><a href="login.html">Login</a></li>  --}}
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="{{URL::to('/Blogging')}}">Read Blog Post<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php if($customer_id != NULL){?>
											<li><a href="{{URL::to('/chatting_forum')}}">Chatting Forum </a></li>
										<?php } ?>

                                        <li><a href="#"> Apply For Ads </a></li>
										<li><a href="#">Products Gallery</a></li>
                                    </ul>
                                </li> 
								<li><a href="contact-us.html">Contact</a></li>
								<?php if($customer_id != NULL){?>
								<li class="pull-right"><a href="{{URL::to('/test_Brain')}}">test IQ</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="{{URL::to('/search')}}" method="GET">
							{{ csrf_field() }}
							<div class="search_box pull-right" style="border:0px; ">
								<input type="text" name="search_now" placeholder="Search...." />
								{{-- <button class="fa fa-search" style="background:white; border:0px;"></button> --}}
			
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
									<?php
										$all_published_slide=DB::table('tbl_slider')
																->where('publication_status', 1)
																->get();
											$count = 0;																
											foreach($all_published_slide as $v_slider){
											?>
											<div class="item <?php echo $count == 1 ? "active" : "" ; $count++;?>">
												<div class="row">
													<div class="col-sm-12"><hr>
												<h1 class="hs3"> BUKATAN <br clear="all"><hr ><span style="color:red; font-weight:bolder;" class="hs4"> GLOBAL</span><span style="color:green; font-weight:bolder" class="hs5">SERVICE</h3><hr>
												<div class="col-sm-6">
														<img src="{{URL::to($v_slider->slider_image)}}" class="girl img-responsive" alt="" style="width:200%" />
														<h2 style="color:orange; font-weight:bolder" class="hs2">Free Online Store</h2> <hr>

<!-- 														<img src="{{asset('frontend/images/home/.png')}}"  class="pricing" alt="" />
 -->													</div>
												
												<!--  -->
														<!-- <button type="button" class="btn btn-default get" style="background:gray;">Get it now</button> -->
													</div>
													<img class="img-circle" class="img-circle" src="{{URL::to('frontend/images/home/logo6.png')}}" alt="" style="width:auto;  margin-top:220px"/>
												<img class="img-circle" src="{{URL::to('frontend/images/home/logo2.png')}}" alt="" style="width:auto;  margin-top:180px" />
												<img class="img-circle" src="{{URL::to('frontend/images/home/logo5.png')}}" alt="" style="width:auto; margin-top:220px" />
												<img class="img-circle" src="{{URL::to('frontend/images/home/logo7.png')}}" alt="" style="width:auto; height:450px;" />
												</div>
											</div>
										<?php } ?>
									</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" >
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" >
							<i class="fa fa-angle-right"></i>
						</a><hr>
<!-- 						<marquee behavior="Alternate" direction=""><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span><span style="color:red">_</span><span style="color:green">_</span><span style="color:orange">_</span></marquee>
 -->
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2 style="color:skyblue;" class="hs1">Category</h2>
						<div class="panel-group category-products" id="accordian">
							<!--category-productsr-->
							<div class="panel panel-default">
									
											<!--code fetching category from admin database-->
										<?php
										$all_published_category=DB::table('tbl_category')
																->where('publication_status', 1)
																->get();
											foreach($all_published_category as $v){?>
											<div class="panel-heading">
											<h4 class="panel-title"><a href="{{URL::to('/category_wise/'.$v->category_id)}}">{{ $v->category_name }} </h4>
											</div>
												<?php } ?>
																						
							</div>
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2 style="color:skyblue;" class="hs1">Companies Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">


						<?php
							$all_published_manufacture=DB::table('manufacture')
													->where('publication_status', 1)
													->get();
						foreach($all_published_manufacture as $manufacture){?>
						<li><a href="{{URL::to('/manufacture_wise/'.$manufacture->manufacture_id)}}"> <span class="pull-right"></span>{{ $manufacture->manufacture_name }} </a></li>
						<?php } ?>



								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2 style="color:skyblue;" class="hs1">Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left" style="color:white;">N 0</b> <b class="pull-right" style="color:white;">N9,999</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<a href="#"><img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" /></a>
						</div><!--/shipping-->
						<div class="shipping text-center"><!--sell your product image icon-->
						<a href="{{URL::to('/Reg/p/r/r')}}" class="buy-pro"><img src="{{asset('sell_your_product_img.jpg')}}" alt="" style="width:100%;" /></a>
						</div><!--end of sell your product image icon-->
					</div>
					<div style="float:left">
							<!-- <h5>Find Us</h5> -->
						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31715.49893245223!2d7.559387489182547!3d6.4661464434442255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a5b059e6555b%3A0x19f5ac25986409a5!2sEmene%2C%20Enugu!5e0!3m2!1sen!2sng!4v1576533363742!5m2!1sen!2sng" width="250" height="520" frameborder="3" style="border:3;" allowfullscreen="" ></iframe> -->

					</div> -->
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items">
					
	@yield('content')
				    </div>
					</div>
					</div>
</section>
				
	<!--Footer-->
				<footer id="footer">
					<div class="footer-top">
						<div class="container">
						  <div class="row">
							<div class="col-sm-2">
							  <div class="companyinfo">
								<h2 id="ecom">
								<a href="#">ecommerce&nbsp;</span>Open shop</a>
								</h2>
								<p class="hs2">Do You Know You Can Be Part Of Our Team</p>
								<p class="hs2">Do You Want Your Ads To Reach Accross the Country in 5MIN?</p>
								<p class="hs1"><a href="#">Apply For Ads! </a></p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 July 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 July 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 July 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 July 2019</h2>
							</div>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="address">
							<img src="{{asset('frontend/images/home/map.png')}}" alt="" />
							<p>No 3, Ogbe Ofu Street, Asaba. Delta State. Nigeria</p>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 class="hs1">Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li class="hs2"><a href="#">Hotel Reservation</a></li>
								<li class="hs2"><a href="#">Agents Control</a></li>
								<li class="hs2"><a href="#">Accessories</a></li>
								<li class="hs2"><a href="#">Cloths</a></li>
								<li class="hs2"><a href="#">Electronics</a></li>
								<li class="hs2"><a href="#">IT Consultancy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 class="hs1">Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li class="hs2"><a href="#">Terms of Use</a></li>
								<li class="hs2"><a href="#">Privecy Policy</a></li>
								<li class="hs2"><a href="#">Refund Policy</a></li>
								<li class="hs2"><a href="#">Billing System</a></li>
								<li class="hs2"><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 class="hs1">About Us</h2>
							<ul class="nav nav-pills nav-stacked; hs2">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Locations In Nigeria</a></li>
								<li><a href="#">Affillate Programs</a></li>
								<li><a href="#">Copyright</a></li>
								<li><a href="#">Term and Conditions</a></li>
								<li><a href="#">Data Policy</a></li>
							</ul>
						</div>
						
						
					</div>
					<!-- <div class="col-sm-10 col-sm-offset-1"> -->
						<!-- <div class="single-widget">
							<h2 class="hs1">About Our Market System</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p class="hs2">Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div> -->
					<!-- </div> -->
					
				</div>
			</div>
		</div>
		
		
			<div class="container">
				<div class="row">
					<p class="pull-left; hs2">Copyright © 2019 1Network-1iP Inc. All rights reserved.Designed by <span><a target="_blank" href="www.wideus.blogspot.com">Ijendu Elias</a></span></p>
					<p class="pull-right hs1">Designed by <span><a target="_blank" href="www.wideus.blogspot.com">Ijendu Elias</a></span></p>
				</div>
			</div>
		</div>
		
	</footer>
	<!--/Footer-->
	
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('frontend/js/main.js')}}"></script>



<script>
$("document").ready(function (params) {
	// $("window").on('load',function () {
		$('#preloader').fadeOut('slow',function () {
			$(this).remove()
		})
	// });
	
})

	//quiz script in javascript1
$(function() {
	
		 $("#button").click(function() {
			var answer = $('#answer-box1').val();
			//triming function
			console.log(answer.trim() === 'abuja');
			if(answer.trim() === ''){
				$('#result2').text('please enter the Answer');
			}else{
			if(answer.trim() === 'abuja') {
				$('#result1').text('Your Answer is Correct');
			}else {
				$('#result1').html('<span style="color:red"> Your Answer Is Not Correct </span><br>The Correct Answer Is abuja');
				/* $('#result1').text('The Correct Answer Is Abuja'); */
			}
			}
		});
});

//quiz script in javascript2
$(function() {
		 $("#button2").click(function() {
			// $("#button").on("click",function(e){
			var answer = $('#answer-box2').val();
			console.log(answer.trim() === 'small medium enterprise');
			if(answer.trim() === ''){
				$('#result2').text('please enter the Answer');
			}else{
			if(answer.trim() === 'small medium enterprise') {
				$('#result2').text('Your Answer is Correct');
			}else {
				$('#result2').html('<span style="color:red"> Your Answer Is Not Correct </span><br>The Correct Answer Is abuja');
				/* $('#result1').text('The Correct Answer Is Abuja'); */
			}
			}
		});
});
				



		//javacript to ask you are you sure you wanna log out?
	$('.customer_log_out').on("click",function(e){
			e.preventDefault();
			var link = $(this).attr("href");
			var logout_item = confirm("Are You sure you want to Logout?");
			if(logout_item){
				window.location.href = link;
			};
		});
	
		
		$('.buy-pro').on("click",function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		var reg = confirm("Please Log In Or SignUp To Be Able to View This Page...If You Have Click Ok To Continue ");
		if(reg){
			window.location.href = link;
		};
	});


//javacript to ask you are you sure you wanna log in?
$('.customer').on("click",function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		var logout_item = confirm("Are You sure you want to Logout?");
		if(logout_item){
			window.location.href = link;
		};
	});
	
//for jquery fadein function
	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$(".hs1").css("color", "red").fadeIn("slow");
		}, 5000)
		
	});

	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$(".hs3").css("color", "orange").fadeIn("slow");
		}, 5000)
		
	});

	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$(".hs4").css("color", "green").fadeIn("slow");
		}, 4500)
		
	});

	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$(".hs5").css("color", "red").fadeIn("slow");
		}, 5200)
		
	});




	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$(".hs2").css("color", "skyblue").fadeIn("slow");
		}, 2000)
		
	});

	$(function() {
		setTimeout(function(){
			//alert('yeah');
			$("#ecom").css("color", "skyblue").fadeIn("slow");
		}, 4000)
	});

	

 

//profile validation
// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.getElementsByClassName('needs-validation');
//     // Loop over them and prevent submission
//     var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//         if (form.checkValidity() === false) {
//           event.preventDefault();
//           event.stopPropagation();
//         }
//         form.classList.add('was-validated');
//       }, false);
//     });
//   }, false);
// })();

	

	
</script>


</body>
</html>