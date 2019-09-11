@extends('admin_layout')
@section('admin_content')
<div class="container">
        <div class="row">
                
            <!-- Striped table start -->
            <div class="col-lg-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">ALL Manufacture </h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr style="width:90%;">
                                            <th scope="col">Manufacture ID</th>
                                            <th scope="col">Manufacture Name</th>
                                            <th scope="col">Manufacture Description</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                            <!--unactive session flashmessage-->
                                                                    <p class="alert-default"  style="float:right">
                                                                        <?php
                                                                        $message=Session::get('message');
                                                                        
                                                                        if($message)
                                                                            echo $message;
                                                                            Session::put('message', null);
                                                                        ?>
                                                                    </p>

                                        </tr>
                                        @if(count($allmanufacture_info) > 0)  
                                    </thead>
                            @foreach($allmanufacture_info as $manu)
                                    <tbody>
                                        <tr style="width:90%;">
                                            <th scope="row">{{ $manu->manufacture_id}}</td>
                                            <td>{{ $manu->manufacture_name}}</td>
                                            <td>{{ $manu->manufacture_description}}</td>

                                                    <td>
                                                        @if($manu->publication_status==1)
                                                        <i class="btn btn-primary fa fa-globe">Active</i>
                                                        @else
                                                        <i class="btn btn-danger fa fa-close">Unactive</i>
                                                        @endif
                                                    </td>
                                                            <!-- generating unactive button engines-->
                                            <td class="center">
                                                 @if($manu->publication_status==1)
                                                <a href="{{URL::to('/unactive_manufacture/'.$manu->manufacture_id) }}" class=" manufacture_deactivate btn btn-danger">
                                                <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            @else
                                            <!-- generating active button engines-->
                                            <a href="{{URL::to('/active_manufacture/'.$manu->manufacture_id) }}" class=" manufacture_activate btn btn-primary">
                                            <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif
                                            </td>

                                             <td>
                                                 <a href="{{URL::to('/delete_manufacture/'.$manu->manufacture_id) }}"  class=" manufacture_delete btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                             </td>

                                             <td>
                                                    <a href="{{URL::to('/edit_Manufacture/'.$manu->manufacture_id) }}" class=" manufacture_edit btn btn-warning">
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
                {{$allmanufacture_info->links()}}
            </div> 
     @else
            <p class="alert-danger"> no category available</p>
            <!-- Striped table end -->
            <!-- Bordered Table start -->
            </div>
          
    @endif
        </div>
@endsection