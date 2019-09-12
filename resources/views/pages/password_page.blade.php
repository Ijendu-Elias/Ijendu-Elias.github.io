@extends('layout')
@section('content')

<div class="container col-sm-6 col-sm-offset-1" style="border-bottom:1px solid skyblue;border-top:1px solid skyblue;"><!-- Customer container-->
    <div class="row">
        <h2 style="margin-left:4%; color:red"><i class="fa fa-user" style="color:skyblue;"></i>&nbsp;Password Update</h2>
    </div>
    <form action="{{URL::to('/update_password',$password_info->customer_id)}}" method="POST"><!--Profile Update-->
        {{ csrf_field() }}
        <div class="form-group">
            <i class="fa fa-lock" style="color:#000;"></i> <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Current Password">
            </div>
                <div class="form-group">
                    <i class="fa fa-lock" style="color:#000;"></i><input type="password" class="form-control" id="exampleFormControlInput1" name="new_password" placeholder="New Password Password"><br>
                    <input type="submit" value="Update Password"  class="btn btn-sm btn-warning" />
                <a class="btn-sm btn-danger " href="{{URL::to('/profile_view')}}" style="float:right"><i class="fa fa-arrow-right">Cancel</i></a>
            </div>
            
            <div class="alert-danger" style="border-radius:3px;">
                <?php
                $message=Session::get('message');
                if($message)
                 echo $message;
                 Session::put('message', null);
             ?>
            </div><!--end of flash message-->
    </form>
</div>
@endsection