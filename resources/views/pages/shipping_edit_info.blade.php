@extends('layout')

@section('content')
<div class="container col-sm-6 col-sm-6-offset-1" style="margin-left:20%;">
   
    
    
    
        <div class="row">
            <h4><i style="color:skyblue; padding-left:5%;">Edit Your Shipping Details Information</i></h4>
        </div><br><br>
                    <form action="{{URL::to('/update_shipping_details',$shipping_info->shipping_id)}}" method="POST"><!--Profile Update-->
                        {{ csrf_field() }}
                         <div class="form-group">
                         <label for="exampleFormControlInput1">Shipping First Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="shipping_first_name" value="{{$shipping_info->shipping_first_name }}">
                     </div>
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Shipping Last Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="shipping_last_name" value="{{$shipping_info->shipping_last_name }}">
                            </div>
                             <div class="form-group">
                         <label for="exampleFormControlInput1">Shipping Email</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$shipping_info->shipping_email }}" disabled>
                            </div>

                                <div class="form-group">
                         <label for="exampleFormControlInput1">Shipping phone Number</label>
                         <input type="text" class="form-control" id="exampleFormControlInput1" name="shipping_phone_number" value="{{$shipping_info->shipping_phone_number }}">
                         </div>
                                            
                     <div class="form-group">
                    <label for="exampleFormControlTextarea1">Shipping Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shipping_address">{{$shipping_info->shipping_address }}</textarea>
                   </div>

             <div class="form-group">
            <label for="exampleFormControlInput1">Shipping City</label>
             <input type="text" class="form-control" id="exampleFormControlInput1" name="shipping_city" value="{{$shipping_info->shipping_city }}">
              </div>
                <input type="submit" value="Update Shipping Details"  class="btn btn-sm btn-warning" /><i class="fa fa-lock"></i>
                <a class="btn-sm btn-danger " href="{{URL::to('/profile_view')}}" style="float:right"><i class="fa fa-arrow-right">Return Back</i></a>
            </form>

                </div>

@endsection