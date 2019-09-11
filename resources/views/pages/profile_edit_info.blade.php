@extends('layout')
@section('content')
<div class="container col-sm-6 col-sm-6-offset-1">
                <?php $customer_id=Session::get('customer_id'); ?>
                <?php
                $profile_get=DB::table('tbl_customers_registered')
                                        ->where('customer_id', $customer_id)
                                        ->get();
                foreach($profile_get as $profile){?>
                <div class="row">
                    <H1> <i class="fa fa-user">Hello</i> &nbsp; &nbsp; {{ $profile->customer_name }}</H1>
                    <?php } ?>
                </div>


            <form action="{{URL::to('/update_profile',$profile_info->customer_id)}}" method="POST"><!--Profile Update-->
                {{ csrf_field() }}
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Customer Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="customer_name" value="{{$profile_info->customer_name }}">
                            </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Customer Email</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$profile_info->customer_email }}" disabled>
                                </div>

            <div class="form-group">
                    <label for="exampleFormControlInput1">Customer phone Number</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number" value="{{$profile_info->phone_number }}">
                             </div>
                                <input type="submit" value="Update Profile"  class="btn btn-sm btn-warning" /><i class="fa fa-lock"></i>
                                <a class="btn-sm btn-danger " href="{{URL::to('/profile_view')}}" style="float:right"><i class="fa fa-arrow-right">Return Back</i></a>
                                
      </form>
</div>

@endsection