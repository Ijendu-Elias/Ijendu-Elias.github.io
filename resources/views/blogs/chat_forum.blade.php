@extends('layout')
@section('content')
<div id="container col-lg-10 col-md-offset-10" style="margin-left:1%;" >
    <ul class="breadcrumb">
      
        <li>
            <i class="icon-home"></i>
        <a href="{{URL::to('/')}}"><span style="color:deepskyblue; font-weight:bolder">Home<span style="color:white">|</span></a>
        <i class="icon-angle-right"></i>
        </li>
            <i class="icon-edit"></i>
            <a href="#">|<span style="color:red; font-weight:bolder;">Drop your Post</span></a>
            <a href="#">|<span style="color:deepskyblue; font-weight:bolder;">Read</span></a>
        <li>
        </li>
        <h3 style="text-align:right; color:red;"> Market Online Forum </h3>


        
        <?php foreach ($get_article as $view){?>

            <div class="container-fluid">
                <div class="row" style="background:white">
                
                    
                    <h4><i class="fa fa-globe" style="color:red"><span style="color:black; cursor:pointer">Post:</span></i><span style="color:gray; font-weight:bold; cursor:pointer"> {{ $view->forum_body }}</</h4>
                    <h5><i class="fa fa-user" style="color:red; cursor:pointer">By:</i><span style="color:deepskyblue; cursor:pointer;">{{ $view->forum_name }}</</h5><br>
                        <h5><i class="fa fa-calender" style="color:red">On:</i><span style="color:deepskyblue">{{Carbon\Carbon::createFromFormat('Y-m-d', $view->post_date)}}</</h5><br><br>
                            <form action="{{URL::to('/reply')}}" method="POST">
                                <input type="text" name="reply" placeholder="reply..."  style="border-radius:5px; width:10%; border:0px; cursor:pointer;" required/>
                                <button  style="width:20px; border:0px; background:lavenderblush"  ><i class="fa fa-arrow-right" style="color:deepskyblue"></i></button> 
                            </form>
                </div>
                            
            </div>

            <?php } ?>
            <br><br><br>

    </ul>
        <div class="row" style="margin-left:0%;">
            <div class="col-lg-5 col-md-offset-0">
                <form role="form" action="{{URL::to('/save_forum')}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Customer Market Chat/Discusstion Forum</label>
                        <input class="form-control" name="forum_name"  placeholder="Full Name E.g Elias"  style="width:200px;">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="forum_number"  placeholder="Phone Number E.g 080XXXXXXXX"  style="width:200px;">
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" rows="3"  name="forum_body"    placeholder="Type your Here......"  style="width:200px;"></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Whats Todays Date?</label>
                        <input class="form-control" name="post_date"  placeholder="Full Name" type="date"  style="border:0px; width:70px;">
                    </div>

                    <input type="submit" value="Post"  class="btn-sm btn-info" /><i class="fa fa-globe"></i>
                    <a class="btn-sm btn-danger " href="{{URL::to('/')}}" style="float:right"><i class="fa fa-arrow-right">Cancel</i></a>
                </form>
                @if (count($errors) > 0 )
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
                @endif
            </div>
                    </div>
          
                
            </div>
       
        </div>
    </div>


@endsection