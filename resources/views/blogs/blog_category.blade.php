@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <i class="fa fa-info"><code style="margin-left:15%;">Add Category For Your Post If Not In The Category Options</code></i>
    </div>
        <form action="{{URL::to('_category')}}" method="post">
            <h4>Add Category</h4>
            {{ csrf_field() }}
            <input type="text" name="category_name" id="" required/><br><br clear="all" />
            <button class="btn btn-sm btn-success" type="submit">Add Category</button>
            <a href="{{URL::to('/Blogging')}}">Return Back <i class="fa fa-arrow-left"></i></a>
        </form>
        
</div>
@endsection