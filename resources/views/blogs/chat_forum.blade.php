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
        <h3 style="text-align:right; color:red;"> Market Chat Room </h3>        
        <?php foreach ($get_article as $view){?>
            <div class="container-fluid">
                <div class="row" style="background:white">
                    <h4><i class="fa fa-globe" style="color:red"><span style="color:black; cursor:pointer">Post:</span></i><span style="color:gray; font-weight:bold; cursor:pointer"> {{ $view->forum_body }}</</h4>
                    <h5><i class="fa fa-user" style="color:red; cursor:pointer">By:</i><span style="color:deepskyblue; cursor:pointer;">{{ $view->forum_name }}</</h5><br>
                        <h5><i class="fa fa-calender" style="color:red">On: {{$view->post_date}}</i><span style="color:deepskyblue"></</h5><br><br> 
                </div>
                         
            </div>
            <div>
        <?php } ?>
            <br>
            <br><br>
           <?php $reply_id=Session::get('reply_id');?>
            <?php 
            $get_article=DB::table('tbl_forum_reply')
            ->get(); 
            foreach($get_article as $ok){?>
            <H5 style="text-align:right; color:green">{{$ok->reply_body}}</h5>
            <h6 style="text-align:right; color:Darkskyblue">{{$ok->reply_date}}</h6><br style="text-align:left;">



    
    <?php }?>
    </ul><!--reply -->
                <form action="{{URL::to('/reply')}}" method="POST">
                    {{ csrf_field() }}
                    <label class="fa fa-comments"  style="float:right; margin-right:5%; color:red; padding-left:2%;">Reply Section</label>
                    <textarea class="form-control" rows="3" name="reply_body" placeholder="Leave reply..."  style="border-radius:5px; width:200px; cursor:pointer; float:right" required></textarea><br><br><br><br>
                    <button  style="width:20px; border:0px; background:lavenderblush; float:right; margin-right:19%;"  ><i class="fa fa-arrow-right" style="color:deepskyblue"></i></button> 
                </form>
                <div class="alert-success">
                    <?php
                       $message=Session::get('mess');
                    
                       if($message)
                        echo $message;
                        Session::put('mess', null);
                    ?>
                </div>
            </div><br><br><br><br>


        <div class="row" style="margin-left:0%;">
            <div class="col-lg-5 col-md-offset-0">
                <form role="form" action="{{URL::to('/save_forum')}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Customer Market Chat/Discusstion Forum</label>
                        <input class="form-control" name="forum_name"  placeholder="E.g Elias Ijendu"  style="width:200px;">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="forum_number"  placeholder="E.g 080xxxxxxxx"  style="width:200px;">
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" rows="3"  name="forum_body"    placeholder="Type your Here......"  style="width:200px;"></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Post Live</label>
                        <input type="hidden" class="form-control" name="post_date"  placeholder="Full Name"                      "  style="border:0px; width:70px;">
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