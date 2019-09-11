@extends('admin_layout')
@section('admin_content')
<div class="container">
        <div class="row">
                
            <!-- Striped table start -->
            <div class="col-lg-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">ALL Categories </h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr style="width:90%;">
                                            <th scope="col"> Category ID</th>
                                            <th scope="col">Categorry Name</th>
                                            <th scope="col">Category Description</th>
                                            <th scope="col">status</th>
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
                                        @if(count($allcategory_info) > 0)  
                                    </thead>
                            @foreach($allcategory_info as $v)
                                    <tbody>
                                        <tr style="width:90%;">
                                            <th scope="row">{{ $v->category_id}}</td>
                                            <td>{{ $v->category_name}}</td>
                                            <td>{{ $v->category_description}}</td>

                                                    <td>
                                                        @if($v->publication_status==1)
                                                        <i class="btn btn-primary fa fa-globe">Active</i>
                                                        @else
                                                        <i class="btn btn-danger fa fa-close">Unactive</i>
                                                        @endif
                                                    </td>
                                                            <!-- generating unactive button engines-->
                                            <td class="center">
                                                 @if($v->publication_status==1)
                                                <a href="{{URL::to('/unactive_category/'.$v->category_id) }}" class="deactivate btn btn-danger">
                                                <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            @else
                                            <!-- generating active button engines-->
                                            <a href="{{URL::to('/active_category/'.$v->category_id) }}" class=" activate btn btn-primary">
                                            <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif
                                            </td>

                                             <td>
                                                 <a href="{{URL::to('/delete_category/'.$v->category_id) }}"  class="delete-btn btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                             </td>

                                             <td>
                                                    <a href="{{URL::to('/edit_category/'.$v->category_id) }}" class="edit btn btn-warning">
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
                {{$allcategory_info->links()}}
            </div> 
     @else
            <p class="alert-danger"> no category available</p>
            <!-- Striped table end -->
            <!-- Bordered Table start -->
            </div>
          
    @endif
        </div>
@endsection