@extends('admin_layout')
@section('admin_content')
<div id="container col-lg-10 col-md-offset-10" style="margin-left:1%;" >
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}"><span style="color:deepskyblue; font-weight:bolder">Home<span style="color:white">|</span></a>
        <i class="icon-angle-right"></i>
        </li>
            <i class="icon-edit"></i>
            <a href="#">|<span style="color:deepskyblue; font-weight:bolder;">Update Category</span></a>
    </ul>
        <div class="row" style="margin-left:10%;">
            <div class="col-lg-10 col-md-offset-0">
                <form role="form" action="{{URL::to('/update_category',$category_info->category_id)}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Update Category</label>
                                
                                <p class=" alert-success" >
                                    <?php
                                    $message=Session::get('message');
                                    if($message)
                                        echo $message;
                                        Session::put('message', null);
                                    ?>
                        </p>

                        <input class="form-control" name="category_name"  value="{{$category_info->category_name }}"  style=" background:black; color:white">
                        </div>
                       <div class="form-group">
                        <label>Product Description</label>
                       <textarea class="form-control" rows="10"  name="category_description" style=" background:black; color:white">
                          {{$category_info->category_description }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary  fa fa-globe">Update Category</button>
                    <button type="close" class="cancel btn btn-danger fa fa-close">Cancel</button>      
                </form>
            </div>
        </div>
    </div>
@endsection