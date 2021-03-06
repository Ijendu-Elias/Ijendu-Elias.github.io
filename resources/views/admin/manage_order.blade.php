@extends('admin_layout')
@section('admin_content')
<div class="container">
        <div class="row">
            <!-- Striped table start -->
            <div class="col-lg-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Order Product Details </h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr style="width:90%;" >
                                            <th scope="col"> Order ID</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Order Total</th>
                                            <th scope="col">status</th>
                                            <th></th>
                                            <th></th>
                                            <th scope="col">Action</th>
                                            <th scope="col">View</th>
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
                                        @if(count($all_order_info) > 0)  
                                    </thead>
                            @foreach($all_order_info as $order)
                                    <tbody>
                                        <tr style="width:90%;">
                                            <th scope="row">{{ $order->order_id}}</td>
                                            <td>{{ $order->customer_name}}</td>
                                            <td>{{ $order->order_total}}</td>
                                            <td>{{ $order->payment_status}}</td>

                                                    <td>
                                                        @if($order->payment_status=='pending')
                                                        <i class="btn btn-danger fa fa-close">Pending</i>
                                                        @else
                                                        <i class="btn btn-success fa fa-globe">Approved</i>
                                                        @endif
                                                    </td>
                                                            <!-- generating unactive button engines-->
                                            <td class="center">
                                                 @if($order->payment_status=='approved')
                                                <a href="{{URL::to('/unactive_order/'.$order->order_id) }}" class="deactivate btn btn-success">
                                                <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @else
                                            <!-- generating active button engines-->
                                            <a href="{{URL::to('/active_order/'.$order->order_id) }}" class=" activate btn btn-danger">
                                            <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            @endif
                                            </td>

                                             <td>
                                                 <a href="{{URL::to('/delete_order/'.$order->order_id) }}"  class="delete-order btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                             </td>

                                             <td>
                                                    <a href="{{URL::to('/view_order/'.$order->order_id) }}" class="edit-order btn btn-warning">
                                                       <i class="fa fa-eye"></i>
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
                {{$all_order_info->links()}}
            </div> 
     @else
            <p class="alert-danger"> no Customer Has Placed Order  available</p>
            <!-- Striped table end -->
            <!-- Bordered Table start -->
            </div>
          
    @endif
        </div>
@endsection