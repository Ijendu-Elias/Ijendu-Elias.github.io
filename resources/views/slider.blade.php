<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                                <?php
                                    $all_published_slide=DB::table('tbl_slider')
                                                            ->where('publication_status', 1)
                                                            ->get();
                                    $count = 0;																
                                    foreach($all_published_slide as $v_slider){
                                    ?>
                                        <div class="item <?php echo $count == 0 ? "active" : "" ; $count++;?>">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h1><span style="color:skyblue; font-weight:bolder">BUKATAN</span><span style="color:red; font-weight:bolder;"> GLOBAL</span><span style="color:green; font-weight:bolder">SERVICE</h3><hr style="">
                                                        <H3><span style="color:skyblue;">B</span> <span style="color:red">G</span> <span style="color:green">S</H1><hr>
                                                    <h2 style="color:orange; font-weight:bolder">Free Online Store</h2> <hr>
                                                    
                                                    <marquee><p style="color:skyblue; font-weight:bolder">We Sell All High Quality Products 100% Online Secure </p></marquee><hr>
                                                    <button type="button" class="btn btn-default get" style="background:gray;">Get it now</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <img src="{{URL::to($v_slider->slider_image)}}" class="girl img-responsive" alt="" />
                                                    <img src="{{asset('frontend/images/home/.png')}}"  class="pricing" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" >
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" >
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->