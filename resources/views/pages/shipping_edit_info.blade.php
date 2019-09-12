@extends('layout')

@section('content')

                
<div class="container"><!-- Shipping container-->
    <div class="container-fluid">
            <marquee><h4 style="margin-left:19%; color:red"><span class="fa fa-info">&nbsp;Customer Shipping Information</span></h4></marquee>
    </div><br>
    
    <div class="row">
        <div class="container col-sm-7 col-md-offset-1" style="height:270px; box-shadow: 1px 1px 1px 1px gray; border-bottom:1px solid gray; min-width:50px; overflow-x:scroll;" >
        <form><!--beginning of Shipping Form-->
            <table class="table">
                    <tr style="color:burlywood">
                            <th style="text-align:center"> Email</th>
                            <th> First Name</th>
                            <th> Last Name</th>
                            <th style="text-align:center"> Address</th>
                            <th>City</th>
                            <th style="text-align:center"> Phone Number</th>
                        </tr>
                        

                    <?php $shipping_id=Session::get('shipping_id'); ?>
                    <?php
                    $shipping_get=DB::table('tbl_shipping')
                                                ->where('shipping_id', $shipping_id)
                                                ->get();
                    foreach($shipping_get as $nyben){?>
                                

                     <tr>
                            <td>{{ $nyben->shipping_email }}</td>
                            <td>{{ $nyben->shipping_first_name }}</td>
                            <td>{{ $nyben->shipping_last_name }}</td>
                            <td>{{ $nyben->shipping_address }}</td>
                            <td>{{ $nyben->shipping_city }}</td>
                            <td>{{ $nyben->shipping_phone_number }}</td>
                        
                        </tr>
                
                <?php } ?>
            </table>
           {{-- <a class="btn-sm btn-info fa fa-edit" href="{{URL::to('/edit-shipping/'.$nyben->shipping_id)}}" style="float:left;" >Edit</a> --}}
            {{-- <a class="btn-sm btn-danger fa fa-times" href="{{URL::to('/')}}" style="float:right">Exit</a> --}}
        </form><!--End of Shipping Form-->
        </div>
    </div>

<br>
<div class="container col-sm-5 col-md-offset-1" style="margin-left:5%;">
        <div class="row">
            <h4><i style="color:skyblue; padding-left:5%;">Edit Your Shipping Details Information</i></h4>
        </div>
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