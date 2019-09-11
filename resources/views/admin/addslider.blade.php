@extends('admin_layout')
@section('admin_content')
<div id="container " style="margin-left:1%;" >
    <ul class="breadcrumb" >
        <li >
            <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}"><span style="color:deepskyblue; font-weight:bolder">Home<span style="color:white">|</span></a>
        
        </li>
            <i class="icon-edit"></i>
            <a href="#">|<span style="color:deepskyblue; font-weight:bolder;">Add Product</span></a>
        <li>
            
        </li>

    </ul>
        <div class="row" style="margin-left:10%;">
            <div class="col-lg-10 col-md-offset-0">
                <form role="form" action="{{URL::to('/save_slider')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        

                        <p class=" alert-success" >
                            <?php
                               $message=Session::get('message');
                            
                               if($message)
                                echo $message;
                                Session::put('message', null);
                            ?>
                        </p>

                   
                        <div class="form-group">
                             <label>Slider Image</label>
                            <input class="input-file uniform_on" type="file" name="slider_image" style=" background:black; color:white">
                        </div>
                      
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"> Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" checked value="1">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary  fa fa-globe">Add Slider</button>
                    <button type="close" class="btn btn-danger fa fa-close"><a href="{{URL::to('/dashboard')}}" style="color:white">Cancel</a></button>      
                </form>
            </div>
        </div>
    </div>
@endsection