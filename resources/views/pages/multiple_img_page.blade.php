@extends('layout')
@section('content')

<H1>Upload Product Images</H1>
<p style="color:red; font-style:italic"><b>Note</b> Please Crop the image usinfg the tool Required Image Sizes will be applied as Validation</p>
<div class="container col-md-8" style="display:flex; width:auto;">

    <div class="image-editor1" style="flex:4;margin-top: 5%;margin-left: 1%; margin-right: 1%; position: relative;border-style: solid;border-color: #fff;">
        <form id="product-form" action="{{URL::to('/submit')}}" method="POST" enctype="">
        {{ csrf_field() }}
          <label for="inputState">Upload Front Image</label>
          <input type="file" name="front_imageData" class="cropit-image-input" required>
                <div class="cropit-preview"></div>
                    <div class="image-size-label">
                      Crop The Image Closer With The Drag Button
                   </div>
                      <input type="range" class="cropit-image-zoom-input">
                      <input type="hidden" name="image_data" id="image-data" class="hidden-image-data1" />
                 </div>


     <div class="image-editor2" style="flex:6;margin-top: 5%;margin-left: auto;margin-right: auto;position: relative;border-style: solid;border-color: #fff;">
          <label for="inputState">Upload Back Image</label>
          <input type="file" name="back_imageData" class="cropit-image-input" required>
                <div class="cropit-preview"></div>
                    <div class="image-size-label">
                      Crop The Image Closer With The Drag Button
                   </div>
                      <input type="range" class="cropit-image-zoom-input">
                      <input type="hidden" name="image_data" id="image-data" class="hidden-image-data2" />
                 </div>

                 <div class="image-editor3" style="flex:6;margin-top: 5%;margin-left: auto;margin-right: auto;position: relative;border-style: solid;border-color: #fff;">
          <label for="inputState">Upload Side Image</label>
          <input type="file" name="side_imageData" class="cropit-image-input" required>
                <div class="cropit-preview"></div>
                    <div class="image-size-label">
                      Crop The Image Closer With The Drag Button
                   </div>
                      <input type="range" class="cropit-image-zoom-input">
                      <input type="hidden" name="image_data" id="image-data" class="hidden-image-data3" />
                 </div>
              </div>
              <button type="submit" id="form-submit" class="btn btn-success" style="width:10%; float:right;">Upload</i></button>
              </form>

<div class="col-md-8">
        <?php
            $customer_id=Session::get('customer_id');
            $all_published_slide=DB::table('tbl_users_upload')
																->where('customer_id', $customer_id)
                                ->first();
                   // foreach($all_published_slide as $v_slider){
                     $img_url = url("/sales_crop_img/{$all_published_slide->image_data}");
                    //  if(!file_exists($img_url)) {continue};
        ?>

        <div class="img-container">
           <img id="fileSelect" class="xxx_images img-thumbnail w-100" src="{{$img_url}}" />
           <h3 class="img-caption">click to update</h3>
           <input type="file" id="fileElem" style="display: none" />
        </div>
</div>



   <script>//crop it
      $(function() {
        $('.image-editor1').cropit();
        $('#form-submit').on('click',function(e) {   //submit
          e.preventDefault();
          // Move cropped image data to hidden input
          var imageData = $('.image-editor1').cropit('export',{
                    type: 'image/jpeg',
                    quality: .9
          });
          console.log(imageData);

          $('.hidden-image-data1').val(imageData);
          // Print HTTP request params

          $('#product-form').submit();

        });
          });


    </script>
    <script>//crop it
      $(function() {
        $('.image-editor2').cropit();
        $('#form-submit').on('click',function(e) {   //submit
          e.preventDefault();
          // Move cropped image data to hidden input
          var imageData = $('.image-editor2').cropit('export',{
                    type: 'image/jpeg',
                    quality: .9
          });
          console.log(imageData);

          $('.hidden-image-data2').val(imageData);
          // Print HTTP request params

          $('#product-form').submit();

        });
      });
    </script>

    <script>//crop it
      $(function() {
        $('.image-editor3').cropit();
        $('#form-submit').on('click',function(e) {   //submit
          e.preventDefault();
          // Move cropped image data to hidden input
          var imageData = $('.image-editor3').cropit('export',{
                    type: 'image/jpeg',
                    quality: .9
          });
          console.log(imageData);

          $('.hidden-image-data3').val(imageData);
          // Print HTTP request params

          $('#product-form').submit();

        });
      });
    </script>


@endsection
