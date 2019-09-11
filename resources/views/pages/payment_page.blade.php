@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}" class="btn btn-default" style="background:white; color:black;">Home</a></li>
              <li class="active">Product Cart Check</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

<?php 
//shoping cart function to view in added add cart page
$content=Cart::content();

?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu" style="background:gray;">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price"> Cost</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total Product</td>
                        <td class="total">Tasks</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
        @foreach($content as $cart_show)
                    <tr>
                        <td class="cart_product">
                            <p><a href="">&nbsp; {{$cart_show->name}}</a></p>
                            <a href=""><img src="{{$cart_show->options->image}}" height="80px" width="80px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">&nbsp; {{$cart_show->name}}</a></p>
                            
                        </td>
                        <td class="cart_price">
                            <p>{{$cart_show->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                <form action="{{URL::to('/update_cart_item')}}" method="POST"><!-- form to update cart item-->
                    {{ csrf_field() }}
                    <input class="cart_quantity_input" type="text" name="qty" value="{{$cart_show->qty}}" autocomplete="off" size="2">
                    <input class="cart_quantity_input" type="hidden" name="rowId" value="{{$cart_show->rowId}}">
                    <input type="submit" name="submit"  value="Add" class="btn btn-sm btn-default">
                </form>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><span style="color:red;">{{$cart_show->total}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete_cart_item/'.$cart_show->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
            @endforeach		
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<div class="container">
	<div class="row">
		<div class="paymentCont col-sm-8">
						<div class="headingWrap">
								<h3 class="headingTop text-center">Select Your Payment Method</h3>	
								<p class="text-center">Click and Make your Payment</p>
						</div>
						    <div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                            
					                <label class="btn paymentMethod active">
					            	    <div class="method visa"></div>
					                        <input type="radio" name="options" checked name="payment_gateway" value="visa"> 
					                        </label>
					                         <label class="btn paymentMethod">
					            	            <div class="method master-card"></div>
					                              <input type="radio" name="options" name="payment_method" value="mastercard"> 
					                         </label>
					                        <label class="btn paymentMethod">
				            		     <div class="method amex"></div>
					                  <input type="radio" name="options" name="payment_method" value="amex">
					                  </label>
					                   <label class="btn paymentMethod">
				             		    <div class="method handcash"></div>
					                      <input type="radio" name="options" name="payment_method" value="handcash"> 
					                       </label>
					                       <label class="btn paymentMethod">
				            		         <div class="method paypal"></div>
					                            <input type="radio" name="options" name="payment_method" value="paypal"> 
                                                 </label>
                                             <label class="btn paymentMethod">
                                                    <div class="method bitcoin"></div>
                                                    <input type="radio" name="options" name="payment_method" value="bitcoin"> 
                                                 </label>
					                    
					                </div>        
						            </div>
					            </div>
                                </div>
                        <form action="{{URL::to('/order_place')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input checked type="radio" name="payment_method" id="pmethod-visa" value="paypal"> visa <br>
                                    <input  type="radio" name="payment_method" id="pmethod-paypal" value="paypal"> Paypal <br>
                                 <input  type="radio"  name="payment_method" id="pmethod-handcash" value="handcash"> HandCash <br>
                                 <input  type="radio"  name="payment_method" id="pmethod-mastercard" value="mastercard"> Master-card <br>
                                 <input  type="radio"  name="payment_method" id="pmethod-bitcoin" value="bitcoin"> Bitcoin <br>
                                 <input  type="radio"  name="payment_method" id="pmethod-cart" value="cart"> Debit card <br>
                                 <input  type="radio"  name="payment_method" id="pmethod-amex" value="amex"> American Express <br>
                                 <input  type="submit" class="btn btn-success" value="Done">
                            </div>        
                            </div>
                        </form>
                     </div>

<script>
    $('.paymentMethod').on('click', function(){
        var card_name = $(this).find('input').val();
        console.log(card_name);
        $('input[name=payment_method]').prop('checked',false);
        $('#pmethod-' + card_name).prop('checked', true);
    })
</script>

@endsection