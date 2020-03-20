@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                                <p class="alert-danger" style="border-radius:3px;">
                                    <?php
                                    $message=Session::get('message');
                                    if($message)
                                    echo $message;
                                    Session::put('message', null);
                                ?>
                                </p><!--end of flash message-->
                    <form action="{{URL::to('/customer_login')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Email" name="customer_email"  required/>
                        <div class="form-group">
                            <input type="password" placeholder="password" name="password" required/>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Ldb9-EUAAAAANA81V9rMZV6xMCyrErip_a9FTCb"></div>

                        <button type="submit" class="btn btn-default" style="width:100%;">Login</button>
                        <span>
                        <input type="checkbox" class="checkbox" value="your agree to our terms and condition" required/><a href="#">Terms and conditions Apply</a> <br>
                        <a href="{{URL::to('/forget-password')}}"  style="color:red"><i class="fa fa-arrow-right" style="color:skyblue"></i>&nbsp; &nbsp; &nbsp;  Forget Password?</a>
                        </span>
                              <div>
                              </div> 
                    </form>
                </div><!--/login form-->
            </div>



            <div class="col-sm-1">
                <h2 class="or"><span class="fa fa-arrow-left">|<span class="fa fa-arrow-right"></h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Dont Have Account?</h2>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{URL::to('/customer_register')}}"  method="POST">
                    {{ csrf_field() }}
                      <input type="text" placeholder="Name" value="{{old('customer_name')}}" name="customer_name" required />
                <input type="email" placeholder="Email Address" value="{{old('customer_email')}}" name="customer_email"required/>
                        <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Enter your phone Number"required />
                        <input type="password" name="password" placeholder="Enter your Password" required id="password" />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required id="confirm_password"  />
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2" style="color:red;"><a href="#">Data Policy Applied</a></label>
                            <div class="controls">
                                <input type="checkbox" name="suspension" checked value="1" style="cursor:pointer">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" style="width:150%; ">Submit</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
<br><br><br>


     <div class="carousel-inner" >
            
            <marquee behavior="scroll" direction=""><h5>Checkout On Our Amazing Offer</h5></marquee><hr>
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
</section><!--/form-->
@endsection
