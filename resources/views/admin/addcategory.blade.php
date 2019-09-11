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
            <a href="#">|<span style="color:deepskyblue; font-weight:bolder;">Add Category</span></a>
        <li>
            
        </li>

    </ul>
        <div class="row" style="margin-left:10%;">
            <div class="col-lg-10 col-md-offset-0">
                <form role="form" action="{{URL::to('/save_category')}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Add Category</label>

                        <p class=" alert-success" >
                            <?php
                               $message=Session::get('message');
                            
                               if($message)
                                echo $message;
                                Session::put('message', null);
                            ?>
                        </p>


                        <input class="form-control" name="category_name" required  style=" background:black; color:white">
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="10"  name="category_description"  required  style=" background:black; color:white"></textarea>
                    </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"> Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" checked value="1">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary  fa fa-globe">Add Category</button>
                    <button type="close" class="btn btn-danger fa fa-close"><a href="{{URL::to('/dashboard')}}" style="color:white">Cancel</a></button>      
                </form>
            </div>
        </div>
    </div>
@endsection