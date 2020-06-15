@extends('layout')
@section('content')

       <?php foreach ($all_published_product as $log){?>

            <div class="col-sm-3"><!-- col-md-sm-4-->
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="img-thumbnail" src="{{URL::to($log->product_image)}}" alt="" style="height:200px; border:2px solid gray;"/>
                                <h2  style="color:black;">N{{$log->product_price}}</h2>
                                <p>{{$log->product_name}}</p>
                                <a href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay"  style="background:skyblue;">
                                <div class="overlay-content" style="background:skyblue;">
                                    <h2>N{{$log->product_price}}</h2>
                                    <p>{{$log->product_name}}</p>
                                    <a style="background:skyblue" href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress"><i class="fa fa-shopping-cart"  style="color:Black" ></i><span style="color:Black">Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{URL::to('/view-product/'.$log->product_id)}}"><i class="fa fa-plus-square"></i>View products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
<?php }?>

                   <!--Image Js Scripting for Image Preview-->
                   {{-- <script>
                        $(document).on('ready', function(){
                            $('#file-upload').on('change', function(e){
                            let element = $(this);
                            let file = element[0].files[0];

                            let fileReader = new FileReader(file);
                            fileReader.readAsDataURL(file)

                            fileReader.onload = (e) => {
                              $('#display-img').attr('src', e.target.result);
                            };
                        })
                        });

                      </script> --}}

                        {{-- <script>
                            $(document).on('ready', function(){
                                $('#file-upload2').on('change', function(e){
                                let element = $(this);
                                let file = element[0].files[0];

                                let fileReader = new FileReader(file);
                                fileReader.readAsDataURL(file)

                                fileReader.onload = (e) => {
                                $('#display-img2').attr('src', e.target.result);
                                };
                            })
                            });

                        </script> --}}






            @endsection
