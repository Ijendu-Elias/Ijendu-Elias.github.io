@extends('layout')
@section('content')
<div class="container col-lg-6 col-lg-offset-3" style="boder:1px solid gray; cursor:progress"  > 
    <div class="row">
        <div class="alert alert-sucess" style="box-shadow:3px 3px 3px 3px red;">
            <h1>Payment Approved Successfully!!!</h1>
            <h4 class="h4" style="backgoround:green; color:aliceblue; font-weight:bolder;">Payment CONFIRMED</h4>
        </div>
    </div>
    <div class="container-fluid">
        <a href="{{URL::to('/')}}">Redirect......<b>Continure Shopping</b></a>

    </div>

    </div>

</div>

@endsection