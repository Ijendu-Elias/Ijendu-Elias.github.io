@extends('layout')
@section('content')
<div class="container"><!-- Customer container-->
    <div class="row">
        <h2 style="margin-left:16%; color:red"><span class="fa fa-arrow-down">Customer Account Information</span></h2>
       

    </div>
    <div class="container-fluid col-md-8 col-md-offset-0" style="height:300px; box-shadow: 1px 1px 1px 1px gray; border-bottom:1px solid gray; overflow-x:scroll;">
        
        <?php $customer_id=Session::get('customer_id'); ?>
            
            <?php
            $profile_get=DB::table('tbl_customers_registered')
                                     ->where('customer_id', $customer_id)
                                    ->get();
        foreach($profile_get as $profile){?>
        <form>
        
          <h1 style="text-align:center">{{ $profile->customer_name }}</h1><br>
            <h3 style="text-align:center">{{ $profile->customer_email }}</h3><br>
            <h4 style="text-align:center">{{ $profile->phone_number }}</h4><br>
       <center> <a class="btn-sm btn-sucess fa fa-lock" href="{{URL::to('/edit-password/'.$profile->customer_id)}}" style="margin-left:0%;">Click To Change Your Password</a></center>


           <center><a class="btn-sm btn-info fa fa-edit" href="{{URL::to('/edit-profile/'.$profile->customer_id)}}" style="margin-left:0%;">Edit</a>
            <a class="btn-sm btn-danger fa fa-times" href="{{URL::to('/')}}" style="margin-left:10%;">Exit</a></center>


           </form>
        <?php } ?>
            <br>
    </div>


<div class="container"><!-- Shipping container-->
    <div class="container-fluid">
            <marquee><h4 style="margin-left:19%; color:red"><span class="fa fa-info">&nbsp;Customer Shipping Information</span></h4></marquee>
    </div>
    
    <div class="row">
        <div class="container col-sm-8 col-md-offset-0" style="height:270px; box-shadow: 1px 1px 1px 1px gray; border-bottom:1px solid gray; min-width:50px; overflow-x:scroll;" >
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
           <a class="btn-sm btn-info fa fa-edit" href="{{URL::to('/edit-shipping/'.$nyben->shipping_id)}}" style="float:left;" >Edit</a>
            <a class="btn-sm btn-danger fa fa-times" href="{{URL::to('/')}}" style="float:right">Exit</a>
        </form><!--End of Shipping Form-->
        </div>
    </div>
   


    </div>
    





@endsection