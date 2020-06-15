var submitDonationForm = function () {
  let donateForm = $("#customer_sell_form");
  donateForm.submit(function (event) {
    event.preventDefault();
    let form = $(this);
    let formContent = form.serializeArray();

    console.log(formContent);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
       // the URL for the request
       url: '/customer_send_sales',//routing

       // whether this is a POST or GET request
       type: 'POST',

       // the type of data we expect back
       data: formContent,

       // function to call for success
       success: function () {
         setTimeout(function(){
           window.location.href = "/regSec"
         },3000)
       },

       // function to call on an error
       error: function () {

       },

       // code to run regardless of success or failure
//        complete: function (xhr, status) {
//
// is finished!');
//         jQuery('#click').addClass('disabled');
//        }

     });


  })
}
submitDonationForm()
