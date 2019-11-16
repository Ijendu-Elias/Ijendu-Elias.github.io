@extends('admin_layout')
@section('admin_content')
                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <small>Product Cpanel</small>
                            <div class="alert alert-dismissable alert-warning">
                                <button data-dismiss="alert" class="close" type="button">&times;</button>
                                Welcome Back &nbsp; <b>{{ Session::get('admin_name') }} </b>
                                <br />
                                <b><small>{{ Session::get('admin_email') }} </small></b>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row" style="width:150%;">
                        <div class="col-md-8">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Products Review</h3>

                                </div>
                        <div class="panel-body">
                    <?php $product_id=Session::get('product_id'); ?>
                    <?php $category_id=Session::get('category_id'); ?>
                    <?php $manufacture_id=Session::get('manufacture_id'); ?>
                    <?php $customer_id=Session::get('customer_id'); ?>
                    <div>
                        <table class="table">
                            <tr style="">
                                <th>Product Id</th>
                                <th>Category Id</th>
                                <th>Manufacture Id</th>
                                <th>Products Name</th>
                                <th>PSD</th>
                                <th>PLD</th>
                                <th>Products Price</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Publication Status</th>
                                <th>products image</th>
                            </tr>
                            <?php
                        $adm_products=DB::table('tbl_products')
                            ->select('tbl_products.*')
                            ->get();
                                foreach($adm_products as $view){?>	
                            <tr>
                                <td>{{$view->product_id}}</td>
                                <td>{{$view->category_id}}</td>
                                <td>{{$view->manufacture_id}}</td>
                                <td>{{$view->product_name}}</td>
                                <td>{{$view->product_short_description}}</td>
                                <td>{{$view->product_long_description}}</td>
                                <td>{{$view->product_price}}</td>
                                <td>{{$view->product_color}}</td>
                                <td>{{$view->product_size}}</td>
                                <td>{{$view->publication_status}}</td>
                                <td><img class="img-rounded" src ="{{ $view->product_image}}" style="width:35px; height:35px"></td>
  
                    <?php } ?>   
                        </table>
                    </div>
                        </div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    
                   
                    <div class="row">
                        <div class="col-lg-11 col-lg-offset-" style="margin-left:3%;">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Products Categories </h3>
                                </div>
                                <div class="panel-body">
                                </div>
                                <div>
                                    <table class="table">
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>publication_status</th>
                                        </tr>
                                        <tr>
                                        <?php
										$adm_category=DB::table('tbl_category')
																->select('tbl_category.*')
																->get();
											foreach($adm_category as $view2){?>
                                                <td>{{$view2->category_id}}</td>
                                                <td>{{$view2->category_name}}</td>
                                                <td>{{$view2->category_description}}</td>
                                                <td>{{$view2->publication_status}}</td>
                                        
                                            
                                         
                                        </tr>
                                        <?php } ?>
                                    </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                         <div class="row">
                                <div class="col-lg-11 col-lg-offset-" style="margin-left:3%;">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Products Companies $ Manufactures </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div>
                                                    <table class="table">
                                                        <tr>
                                                            <th>Manufacturer Id</th>
                                                            <th>Products Manufacturer/Company Name</th>
                                                            <th>Company Description</th>
                                                            <th>publication_status</th>
                                                        </tr>
                                                        <tr>
                                                        <?php
                                                        $adm_manufacture=DB::table('manufacture')
                                                                                ->select('manufacture.*')
                                                                                ->get();
                                                                foreach($adm_manufacture as $view3){?>
                                                                    <td>{{$view3->manufacture_id}}</td>
                                                                    <td>{{$view3->manufacture_name}}</td>
                                                                    <td>{{$view3->manufacture_description}}</td>
                                                                    <td>{{$view3->publication_status}}</td>
                                                        

                                                        </tr>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div>
                                            <table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <div class="col-lg-2">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-magnet"></i> manage Ads</h3>
                                </div>
                                <div>
                                        <a href="#" class="btn btn-sm btn-success">Add Ads</a>
                                        <a href="#" class="btn btn-sm btn-danger">View Ads</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-10">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-magnet"></i> Registered Users</h3>
                                    </div>
                                    <div>
                                    <table class="table">
                                            <tr>
                                                <th>User Id</th>
                                                <th>Users Name</th>
                                                <th>Users Email</th>
                                                <th>Users Contacts</th>
                                                <th>Users Varified Status</th>
                                                <th>Users Status</th>
                                                <th>Action</th>

                                            </tr>
                                            <?php
                                            $adm_users=DB::table('tbl_customers_registered')
                                                                    ->select('tbl_customers_registered.*')
                                                                    ->get();
                                                foreach($adm_users as $view4){?>
                                                    <td>{{$view4->customer_id}}</td>
                                                    <td>{{$view4->customer_name}}</td>
                                                    <td>{{$view4->customer_email}}</td>
                                                    <td>{{$view4->phone_number}}</td>
                                                    <td>{{$view4->email_verified_at}}</td>
                                                    <td>
                                                        @if($view4->suspension==1)
                                                        <i class="btn btn-primary fa fa-globe">Access Granted</i>
                                                        @else
                                                        <i class="btn btn-danger fa fa-close">Access Denied</i>
                                                        @endif
                                                    </td>
                                                     <!-- generating unactive button engines-->
                                                    <td class="center">
                                                         @if($view4->suspension==1)
                                                        <a href="{{URL::to('/unactive_user/'.$view4->customer_id) }}" class="deactivate_user btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    @else
                                                    <!-- generating active button engines-->
                                                    <a href="{{URL::to('/active_user/'.$view4->customer_id) }}" class=" activate_user btn btn-primary">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    </a>
                                                    @endif
                                                    </td>
                                            
                                            </tr>
                                            
                                            <?php } ?>
                                            <tr>
                                                
                                            <td colspan="5" style="text-align:right;">Total Users : {{$adm_users->count()}}</td>
                                            
                                            </tr>
                                    </div>
                                </div>
    
                            </div>
                            
                        
                    </div>
                </div>
                </div>
        @endsection