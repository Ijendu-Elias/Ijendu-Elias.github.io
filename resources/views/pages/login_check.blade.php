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
                        <input type="password" placeholder="password" name="password" required/>
                        <button type="submit" class="btn btn-default">Login</button>
                        <span>
                        <input type="checkbox" class="checkbox" value="your agree to our terms and condition" required/><a href="#">Terms and conditions Apply</a> <br>
                        <a href="{{URL::to('/forget-password')}}"  style="color:red"><i class="fa fa-arrow-right" style="color:skyblue"></i>&nbsp; &nbsp; &nbsp;  Forget Password?</a>
                        </span>
                               
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
                      <input type="text" placeholder="Name" value="{{old('customer_name')}}" name="customer_name" required/>
                <input type="email" placeholder="Email Address" value="{{old('customer_email')}}" name="customer_email"required/>
                        <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Enter your phone Number"required />
                        <input type="password" name="password" placeholder="Enter your Password" required id="password" />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required id="confirm_password"  />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
