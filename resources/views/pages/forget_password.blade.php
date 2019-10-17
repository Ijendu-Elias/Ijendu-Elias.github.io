@extends('layout')
@section('content')

<div class="container col-md-6 col-md-offset-3"  style=" border-top:1px solid lightgray;  border-left:1px solid lightgray; border-right:1px solid lightgray;">
    <div class="row">
        <h1 style="margin-left:3%; color:skyblue">Forget Password</h1>
        <i style="margin-left:3%; color:red" class="fa fa-envelope"></i>Enter Your Email Address
    </div>

    <form action="{{URL::to('/send_mail')}}" method="POST">
        {{ csrf_field() }}
        <i style="font-size:25px"><input type="text" name="email" {{old('customer_email')}} required ></i><br>
        <button class="btn-sm btn-info" style=" margin-top:2%;">Reset</button><hr><hr><hr>
    </form>

</div>

@endsection