@extends('layout')
@section('content')

        <h2 class="title text-center hs1" style="color:skyblue">Iterms In The Store</h2>
       <?php foreach ($all_published_product as $log){?>

            <div class="col-sm-3"><!-- col-md-sm-4-->
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="img-thumbnail" src="{{URL::to($log->product_image)}}" alt="" style="height:200px; border:2px solid gray; width:30%; height:30%;""/>
                                <h2  style="color:black;">N{{$log->product_price}}</h2>
                                <p>{{$log->product_name}}</p>
                                <a href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay"  style="background:skyblue;">
                                <div class="overlay-content" style="background:skyblue;">
                                    <h2>N{{$log->product_price}}</h2>
                                    <p>{{$log->product_name}}</p>
                                    <a style="background:skyblue" href="{{URL::to('/view-product/'.$log->product_id)}}" class="btn btn-default add-to-cart" style="cursor:progress"><i class="fa fa-shopping-cart"  style="color:white" ></i><span style="color:white">Add to cart</a>
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
            </div><!--features_items-->

            <!-- {{-- <div class="container">
                <div class="row">
                    <h4 style="margin-right:30%;"align="center" ><code>Sell Your Product</code><Span style="color:skyblue">&nbsp;|&nbsp;</Span><code>Buy A Product On Contacts</code></h4><br>

                    

                     <form action="{{URL::to('save_users_upload')}}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="form-group" for="">Products Name</label>
                        <input type="hidden" name="customer_id" id="" />
                        <input type="text" name="users_product_name" id="" required  style="margin-left:10%;"/><br>
                        <label class="form-group" for="">Sellers Names</label>
                        <input type="text" name="users_seller_name" id="" required  style="margin-left:10.7%;"/><br>
                        <label class="form-group" for="">Sellers Phone Number</label>
                        <input type="text" name="users_seller_phone" id="" required   style="margin-left:6.2%;"/><br>
                        <label for="">Products Description</label><br>
                        <textarea name="users_product_description" id="" cols="" rows="10" style="width:50%;" required></textarea><br>
                        
                        <label for="">Upload The Front Image of your Product For Sale</label>
                        <input type="file" name="users_image_front" id="file-upload" required /><br>
                            <img id="display-img" src="" style="width:10%; height:10%" class="img-rounded"><br>
                            
                        {{-- <label for="">Upload The Back Image of your Product For Sale</label>
                        <input type="file" name="users_image_back" id="file-upload2" required /><br>
                            <img id="display-img2" src="" style="width:10%; height:10%" class="img-rounded"><br> --}}
                        {{-- <button class="btn btn-sm btn-default" type="submit">Upload Online</button>
                    </form><br>  -->

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




                </div>

            </div>
            
            @endsection