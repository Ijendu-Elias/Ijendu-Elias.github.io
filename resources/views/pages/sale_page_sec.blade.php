@extends('layout')
@section('content')
<div class="container col-md-10 col-offset-3" >
    <div class="row">
        <?php $customer_id=Session::get('customer_id'); ?>
       

        <h3>Fill In The Form About Your Products</h3>
    </div>
    <form id="product-form" action="{{URL::to('/reg2')}}" method="POST"><!--Customer Registration sell your page-->
      {{ csrf_field() }}
            <div class="form-row">
                <label for="inputEmail4">Products Name</label>                                     
                <input type="text" name="pro_name" class="form-control" id="inputEmail4" placeholder="Email" value="" required>
              <div class="form-group col-md-6" style="margin-left:50%">
                <label for="inputEmail4" style="margin-left:-115%">Product Condition</label>
                <input type="text" name="pro_condition" class="form-control" id="inputEmail4" placeholder="08035643234"  style="margin-left:-115%"required value="">
              </div>
       
            </div>
            <div class="form-group">
              <label for="inputAddress">Product Warrantee</label>
              <input type="text" name="pro_warrantee" class="form-control" id="inputAddress" placeholder="1234 Main St.." required>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Product Colour</label>
              <input type="text" name="pro_color" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Product Feature1</label>
              <input type="text" name="pro_feature1" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Product Feature2</label>
              <input type="text" name="pro_feature2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Select Products Category</label>
                <select name="category" id="inputcat" class="form-control" required>
                  <option >Category</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                    <label for="inputState">Select Products SubCategory</label>
                    <select name="subcategory" id="inputsubcat" class="form-control" style="margin-left:-8%">
                      <option></option>
                      <option>...</option>
                    </select>
                  </div><br><br><br><br>

                  <div class="image-editor">
                  <label for="inputState">Add Your Selfie Photo</label>
                <input type="file" name="imageData" class="cropit-image-input">
                <div class="cropit-preview"></div>
                <div class="image-size-label">
                  Crop The Image Closer With The Drag Button
                </div>
                <input type="range" class="cropit-image-zoom-input">
                <input type="hidden" name="image_data" id="image-data" class="hidden-image-data" />
                <button type="submit" id="form-submit" class="btn btn-success" style="width:10%; float:right;"><i class="fa fa-arrow-right">Next</i></button>
               </form>
          </div>

          <script>
              var categories = ["select", "electronics", "cloths", "furnitures", "shoes", "accessories", "cars"]
              var subcategory = [{"select":["please choose"]}, {"electronics":["phones","washing machines", "laptops","home theatres", "television"]}, {"cloths":["females wears", "males wear"]}, {"furnitures":["chairs", "table", "arts designs","wall designs", "bed", "stows"]}, {"accessories":["sprays","creams"]}, {"cars":["trailers", "others"]}]
              
              var cat_options_html = "";
              var subcat_options_html = "";
              
              categories.forEach(function(val,indx){
                  //console.log(val);
                  cat_options_html = cat_options_html + `<option value="${val}">${val}</option>`;                  
              })

              $('#inputcat').html(cat_options_html);              
              $('#inputcat').on('change', function(){
                  var selected_value = $(this).val();
                  subcategory.forEach(function(val,indx){
                      if(val.hasOwnProperty(selected_value)){
                        //console.log(val[selected_value]);
                        var sub_cat_arr = val[selected_value];
                        subcat_options_html = "";
                        sub_cat_arr.forEach(function(val,indx){
                          subcat_options_html = subcat_options_html + `<option value="${val}">${val}</option>`;
                        });
                        $('#inputsubcat').html(subcat_options_html);
                      }
                  });
              });
          </script>
          <!--Code to implement change event on items selected-->


    <script>//crop it
      $(function() {
        $('.image-editor').cropit();
        $('#form-submit').on('click',function(e) {   //submit
          e.preventDefault();
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export',{
                    type: 'image/jpeg',
                    quality: .9  
          });
          console.log(imageData);
          
          $('.hidden-image-data').val(imageData);
          // Print HTTP request params

          $('#product-form').submit();
          
        });
      });
    </script>
     @endsection
