@extends('admin_layout')
@section('admin_content')
<div class="container">
        <div class="row">
            <!-- Striped table start -->
            <div class="col-lg-12 col-md-offset-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">ALL Products In The Store </h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr style="width:90%;">
                                            <th scope="col"> Product ID</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Manufacture Name</th>
                                            <th scope="col">P.S.D</th>
                                            <th scope="col">P.L.D</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Size</th>
                                            <th scope="col">Product Color</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                            <!--unactive session flashmessage-->
                                                                    <p class=" alert-default" >
                                                                        <?php
                                                                        $message=Session::get('message');
                                                                        
                                                                        if($message)
                                                                            echo $message;
                                                                            Session::put('message', null);
                                                                        ?>
                                                                    </p>

                                        </tr>
                                        @if(count($allproduct_info) > 0)  
                                    </thead>
                            @foreach($allproduct_info as $pro)
                                    <tbody>
                                        <tr style="width:90%;">
                                            <th scope="row">{{ $pro->product_id}}</td>
                                            <td>{{ $pro->product_name}}</td>

                                            <td>{{ $pro->category_name}}</td>
                                            <td>{{ $pro->manufacture_name}}</td>

                                            <td>{{ $pro->product_short_description}}</td>
                                            <td>{{ $pro->product_long_description}}</td>
                                            <td>N{{ $pro->product_price}}</td>
                                            <td><img class="img-rounded" src ="{{ $pro->product_image}}" style="width:35px; height:35px"></td>
                                            <td>{{ $pro->product_size}}</td>
                                            <td>{{ $pro->product_color}}</td>
                                            <td>
                                                @if($pro->publication_status==1)
                                                <i class="btn btn-primary fa fa-globe">Active</i>
                                                @else
                                                <i class="btn btn-danger fa fa-close">Unactive</i>
                                                @endif
                                            </td>
                                             <!-- generating unactive button engines-->
                                            <td class="center">
                                                 @if($pro->publication_status==1)
                                                <a href="{{URL::to('/unactive_product/'.$pro->product_id) }}" class="deactivate_pro btn btn-danger">
                                                <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            @else
                                            <!-- generating active button engines-->
                                            <a href="{{URL::to('/active_product/'.$pro->product_id) }}" class=" activate_pro btn btn-primary">
                                            <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif
                                            </td>
                                             <td>
                                                 <a href="{{URL::to('/delete_product/'.$pro->product_id) }}"  class="delete_pro btn btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                             </td>
                                             <td>
                                             <a href="{{URL::to('/edit_product/'.$pro->product_id) }}" class="edit_pro btn btn-warning">
                                                 <i class="fa fa-edit"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                    </tbody>
                            @endforeach
                           
                                </table>
    
                            </div>
                        </div>
                        
                    </div>
                </div>
                {{-- {{$allproduct_info->links()}} --}}
            </div> 
     @else
            <p class="alert-danger"> no product available</p>
            <!-- Striped table end -->
            <!-- Bordered Table start -->
            </div>
          
    @endif
        </div>
@endsection