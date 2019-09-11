@extends('admin_layout')
@section('admin_content')

    <div class="row-fluid sortable  col-lg-8 col-md-offset-2">
        <div class="box span6">
            <div class="box-header">
                <h2><i class="fa fa-user" style="color:skyblue"></i><span class="break">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Customer Details</h2>
            </div>
            <div class="box-content">
                <table class="table">
            
                    <thead>
                    <tr style="background:red">
                        <th>Username</th>
                        <th>Mobile Number</th>
                        <th>Order Id</th>
                        <th>Customer Id </th>
                        <th>shipping Id</th>
                        <th>Order Details Id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_by_id as $item)  
                    
                    <tr>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->order_id}}</td>
                        <td>{{$item->customer_id}}</td>
                        <td>{{$item->shipping_id}}</td>
                        <td>{{$item->order_details_id}}</td>

                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
            <div class="box span6"><br><br>
                <div class="box-header">
                    <h2><marquee><i class="fa fa-ambulance" style="color:skyblue"></i></marquee><span class="break"></span>Shipping Details</h2>
                </div>
                
                <div class="box-content">
                    <div class="box-header">
                        <table class="table table-striped">
                            <thead>
                                <tr style="background:skyblue">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Order Id</th>
                                    <th>Customer_Id</th>
                                    <th>Order Details Id</th>
                                    <th>Shipping Id</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order_by_id as $item2)  
                              
                                <tr>
                                    <td>{{$item2->shipping_first_name}}</td>
                                    <td>{{$item2->shipping_last_name}}</td>
                                    <td>{{$item2->shipping_address}}</td>
                                    <td>{{$item2->shipping_phone_number}}</td>
                                    <td>{{$item2->shipping_email}}</td>
                                    <td>{{$item2->order_id}}</td>
                                    <td>{{$item2->customer_id}}</td>
                                    <td>{{$item2->order_details_id}}</td>
                                    <td>{{$item2->shipping_id}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                   
                        </table>
                    </div>
                </div>
            </div>

            <div class="row-fluid sortable">
                <div class="box span12"><br><br>
                    <div class="box-header">
                        <h2><i class="fa fa-address-book" style="color:skyblue"></i><span class="break"></span>Order  Details</h2>
                    </div>
                    
                    <div class="box-content">
                        <div class="box-header" dta-original-title>
                            <table class="table table-striped">
                                <thead>
                                                                    
                                    <tr style="background:Orange">
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Amounts</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        
                                       
                                    </tr>
                                </thead>
    
                                <tbody>
                                        @foreach ($order_by_id as $item3)  
                                        
                                    <tr>
                                        <td>{{$item3->order_id}}</td>
                                        <td>{{$item3->customer_name}}</td>
                                        <td>{{$item3->product_name}}</td>
                                        <td>{{$item3->product_price}}</td>
                                        <td>{{$item3->product_sales_quantity}}</td>
                                        <td>{{$item3->order_total}}</td>
                                        <td>{{$item3->payment_method}}</</td>
                                        <td>{{$item3->payment_status}}</</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                {{-- <tr>
                                    <td colspan="4"> Total Bill</td>
                                    <td><strong style="color:skyblue">{{$item->order_total}}</strong> &nbsp;Naira Only</td>
                                </tr> --}}
                                </tfoot>
                       
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>







@endsection