@extends('layout')
@section('content')
<div class="container col-md-6 col-md-offset-3">
    <div class="row">
            <a class="btn btn-lg btn-success" href="{{URL::to('/email-verify-resend')}}">Click to Get Another Varication</a>
    </div><br><br>
<marquee behavior="Alternate" direction=""><i style="color:red;"> You Welcome To Bukatan Online Service Store</marquee>
<marquee behavior="slide" direction=""><i style="color:skyblue"> A mail Verification Was Sent To Your Email: Please Verify</marquee>

</div>
@endsection

