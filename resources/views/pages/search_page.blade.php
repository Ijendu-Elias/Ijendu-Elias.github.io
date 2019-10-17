@extends('layout')

@section('content')
<div class="container col-md-10">
    <div class="row">
            <h5>Product Search result</h5>
    </div>

    @forelse($products as $product)
    <div class="container-fluid">
    <a style="" href="{{URL::to('/view-product/'.$product->product_id)}}"><img src="{{ $product->product_image}}" style="width:20%; height:20%;"></a><br>
   <a href="{{URL::to('/view-product/'.$product->product_id)}}"> {{ $product->product_name }}</a><br><br>
    @empty
        <h1>No Product Found</h1>
    @endempty
    </div>  
</div>

@endsection