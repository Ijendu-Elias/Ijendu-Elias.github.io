@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="login-form"><!--login form-->
                    <h1><?php Session::get('shipping_id') ?></h1>
                    <h4><b>Thanks for the Order, we will contanct you as soon as possible... less than an Hour hours.</b></h4>

                </div><!--/login form-->
            </div>



            {{-- <div class="col-sm-1">
                <h2 class="or"><span class="fa fa-arrow-left">|<span class="fa fa-arrow-right"></h2>
            </div> --}}
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2></h2>
                

                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
