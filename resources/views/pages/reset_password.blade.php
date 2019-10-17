@extends('layout')
@section('content')

<div class="container col-md-6 col-md-offset-3" style="border:ipx solid Gray;">
    <div class="row">
        <h1>Update Password</h1>
        <h5>Enter Your New Password</h5>
    </div>

    <form action="{{URL::to('/reset-password')}}" method="POST">
        {{ csrf_field() }}
    <input type="hidden" name="email" value="{{ $email }}">
        <input type="password" name="password"  placeholder="Enter your New Password">
        <input type="password" name="password_confirmation"  placeholder="Enter your Password Again">
        <button class="btn btn-success">Submit</button>
    </form>

</div>

@endsection