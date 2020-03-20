@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>Customer Information</h3>
            <ul class="nav">
                
                <li>
                    <a href="{{URL::to('/display_product_page')}}"><i class="fa fa-times" style="color:red"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <marquee><i class="fa fa-users" style="color:red"><span class=" fa fa-arrow-right">Customers Information Form&NonBreakingSpace; | &nbsp;</i><i style="color:red">Please Esteemed Customer, This Information Will Be Used for Further Processing....PLease Fill in Your Your Information</i></marquee>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 col-sm-offset-1">
                    <div class="bill-to">
                        <p>Billing Information</p>
                        <div class="form-one">
                            <form action="{{URL::to('/Save_shipping_detail')}}" method="POST">
                                {{csrf_field()}}
                                <input type="email" placeholder="Enter Your Email Address*" name="shipping_email" required>
                                <input type="text" placeholder="Enter Your First Name" name="shipping_first_name" required>
                                <input type="text" placeholder="Enter Your Last name *" name="shipping_last_name" required>
                                <input type="address" placeholder=" Enter Your Home/Office Address*" name="shipping_address" required>
                                <input type="phone" placeholder="Enter Your Phone Number" name="shipping_phone_number" required>
                                <input type="Text" placeholder="Enter Your City/Country" name="shipping_city" required>
                                <input type="submit" value="request Order" class="btn btn-sm btn-success" style="color:black; font-weight:bolder; "><span class="fa fa-arrow-right"style-="color:deepskyblue">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>					
            </div>
        </div>
        <div class="review-payment ">
            <h2>Shipping Review</h2>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection