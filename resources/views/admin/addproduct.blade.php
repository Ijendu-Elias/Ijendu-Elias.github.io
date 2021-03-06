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
                <form role="form" action="{{URL::to('/save_product')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                                <p class=" alert-success" >
                                    <?php
                                    $message=Session::get('message');
                                    
                                    if($message)
                                        echo $message;
                                        Session::put('message', null);
                                    ?>
                                </p>                       
                    <input class="form-control" name="product_name" required  style=" background:black; color:white;">
                    </div>
                    <div class="control-group">
                    <label class="control-label">Product Category
                    <div class="controls">       
                        <select style="width:250px; border-radius:3px; background:black; color:white" name="category_id">
                        <option>Select Category</option>

                            <?php
                                $all_published_category=DB::table('tbl_category')
                                                ->where('publication_status', 1)
                                                ->get();
                                 foreach($all_published_category as $v){?>
                                    <option value="{{$v->category_id }}">{{$v->category_name }}</option>
                                <?php }?>

                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="control-group">
                            <label class="control-label">Manufacture name
                                <div class="controls">
                                    <select  style="width:250px; border-radius:3px;  color:#000;  background:black; color:white"  name="manufacture_id">
                                    <option>Select Brands</option>
                                     <?php
                                         $all_published_manufacture=DB::table('manufacture')
                                                             ->where('publication_status', 1)
                                                             ->get();
                                    foreach($all_published_manufacture as $manufacture){?>
                                <option style="color:white;" value="{{$manufacture->manufacture_id }}">{{ $manufacture->manufacture_name }}</option>
                                    <?php }?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    <div class="form-group">
                        <label>Product short Description</label>
                        <textarea class="form-control" rows="10"  name="product_short_description"  required  style="color:black; background:black; color:white"></textarea>
                    </div>

                    <div class="form-group">
                            <label>Product long Description</label>
                            <textarea class="form-control" rows="10"  name="product_long_description"  required  style="color:black; background:black; color:white"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input class="form-control" name="product_price" required  style="background:black; color:white">
                        </div>

                        <div class="form-group">
                             <label>Product Image</label>
                            <input class="input-file uniform_on" type="file" name="product_image" style=" background:black; color:white">
                        </div>
                        
                        <div class="form-group">
                                <label>Product Size</label>
                                <input class="form-control" name="product_size" required  style="color:black;  background:black; color:white">
                            </div>

                            <div class="form-group">
                                <label>Product Color</label>
                                <input class="form-control" name="product_color" required  style="color:black;  background:black; color:white">
                            </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"> Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" checked value="1">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary  fa fa-globe">Add Product</button>
                    <button type="close" class="btn btn-danger fa fa-close"><a href="{{URL::to('/dashboard')}}" style="color:white">Cancel</a></button>      
                </form>
            </div>
        </div>
    </div>
@endsection