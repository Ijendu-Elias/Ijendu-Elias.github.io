@extends('admin_layout')
@section('admin_content')
<div class="container">
        <div class="row">
            <!-- Striped table start -->
            <div class="col-lg-8 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Slider User Side Image  </h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr style="width:90%;">
                                            <th scope="col"> Slider Id</th>
                                            <th scope="col">Slider Image on the user side</th>
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
                                        @if(count($allslider_info) > 0)  
                                    </thead>
                            @foreach($allslider_info as $slide)
                                    <tbody>
                                        <tr style="width:90%;">
                                            <th scope="row">{{ $slide->slider_id}}</td>  
                                            <td><img class="img-rounded" src ="{{ $slide->slider_image}}" style="width:150px; height:50px;"></td>
                                         
                                            <td>
                                                @if($slide->publication_status==1)
                                                <i class="btn btn-primary fa fa-globe">Active</i>
                                                @else
                                                <i class="btn btn-danger fa fa-close">Unactive</i>
                                                @endif
                                            </td>
                                             <!-- generating unactive button engines-->
                                            <td class="center">
                                                 @if($slide->publication_status==1)
                                                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id) }}" class="deactivate_slide btn btn-danger">
                                                <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            @else
                                            <!-- generating active button engines-->
                                            <a href="{{URL::to('/active-slide/'.$slide->slider_id) }}" class=" activate_slide btn btn-primary">
                                            <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif
                                            </td>
                                             <td>
                                                 <a href="{{URL::to('/delete-slide/'.$slide->slider_id) }}"  class="delete_slide btn btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                             </td>
                                             <td>
                                             <a href="{{URL::to('/edit-slide/'.$slide->slider_id) }}" class="edit_slide btn btn-warning">
                                                 <i class="fa fa-edit"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                            @endforeach
                           
                                </table>
                                {{$allslider_info->links()}}
                            </div>
                        </div>
                        
                    </div>
                </div>
                {{-- {{$allproduct_info->links()}} --}}
            </div> 
     @else
            <p class="alert-danger"> no Slider available</p>
            <!-- Striped table end -->
            <!-- Bordered Table start -->
            </div>
          
    @endif
        </div>
@endsection