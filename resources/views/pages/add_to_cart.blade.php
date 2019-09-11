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


		// echo "<pre>";
		// print_r($content);
		// echo"</pre>";
		// exit();
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-4  col-sm-offset-2">
					<div class="total_area">
						<ul>
							<li style="color:red">Product Total <span style="color:black;">N{{Cart::subtotal()}}</span></li>
							<li style="color:red">Tax <span style="color:black;">N{{Cart::tax()}}</span></li>
							<li style="color:red">Shipping Cost <span style="color:black;">Free</span></li>
							<li style="color:red">Product Total <span style="color:black;">N{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-warning update" href="">Update</a>
					<?php $customer_id=Session::get('customer_id'); ?>						
					@if($customer_id != NULL)
					<a class="btn btn-success check_out" href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkouts</a>
					@else
							<a class="btn btn-success check_out" href="{{URL::to('/login_checking')}}">Check Out</a>
					@endif
					
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

    
@endsection