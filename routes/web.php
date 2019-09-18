<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend side..................................
Route::get('/', 'HomeController@index')->name('home');

//product category wise at layout user side
Route::get('/category_wise/{category_id}', 'HomeController@show_category_product_wise');
//product category wise at layout user side
Route::get('/manufacture_wise/{manufacture_id}', 'HomeController@show_manufacture_product_wise');
//view products routes
Route::get('/view-product/{product_id}', 'HomeController@view_product_by_id');








//backend side.............................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
//admin dashboard side........................
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//catetory related 
Route::get('/add_category','CategoryController@index');
//all category display
Route::get('/all_category','CategoryController@all_category');
//saving category rout to database
Route::post('/save_category','CategoryController@save_category');
//unactive
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
//active
Route::get('/active_category/{category_id}','CategoryController@active_category');
//edit category
Route::get('/edit_category/{category_id}','CategoryController@edit_cat');
//update category
Route::post('/update_category/{category_id}','CategoryController@update_cat');
//delete category
Route::get('/delete_category/{category_id}','CategoryController@delete_cat');


//manufacture Or brands Are Here
Route::get('/add_manufacture','ManufactureController@index');
//to save Manufacture to database
Route::post('/save_manufacture','ManufactureController@save_manufacture');
// to Display all Added Manufacture from database
Route::get('/allmanufacture','ManufactureController@all_manufacture');
//delete manufacture from database
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@delete_manu');
//editing manufacture
Route::get('/edit_Manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
//unactive manufacture
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
//active manufacture
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
//update manufacture
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@update_manufacture');


//products routes to add products
Route::get('/add_product','ProductController@index');
//all product display route
Route::get('/all_product','ProductController@show_product');
//save product route
Route::post('/save_product','ProductController@save_product');
//unactive product
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
//active product
Route::get('/active_product/{product_id}','ProductController@active_product');
//delete Product
//delete category
Route::get('/delete_product/{product_id}','ProductController@delete_pro');
//edit product
Route::get('/edit_product/{product_id}','ProductController@edit_pro');
//update product
Route::post('/update_product/{product_id}','ProductController@update_pro');
//managege Order
Route::get('/manage_order','ProductController@manage_order');
Route::get('/view_order/{order_id}','ProductController@view_order');




//Slider Route
Route::get('/add_slider','SliderController@Slide');
//all Slider View
Route::get('/all_slider','SliderController@all_Slide');
//save slider route
Route::post('/save_slider','SliderController@save_slide');
//unactive slide
Route::get('/unactive-slide/{slider_id}','SliderController@unactive_slider');
//active slide
Route::get('/active-slide/{slider_id}','SliderController@active_slider');
//delete slide
Route::get('/delete-slide/{slider_id}','SliderController@delete_slider');
//edit slide
Route::get('/edit-slide/{slider_id}','SliderController@edit_slider');



//cart routing starts here...............................
//adding to cart route
Route::post('/add_cart','CartingController@add_to_carting');
//showing/displaying added Cart routes
Route::get('/display_product_page','CartingController@display_product_page');
//deleting added cart item from cart view page route
Route::get('/delete_cart_item/{rowId}','CartingController@delete_cart_item');
//updating cart item route
Route::post('/update_cart_item','CartingController@update_cart');

//checkout/login function starts here......................
Route::get('/login_checking','CheckoutController@login_page');
//customer page registration page route
Route::post('/customer_register','CheckoutController@register');
//checkout route
Route::get('/checkout','CheckoutController@checkout_page');
//Save Shipping details route
Route::post('/Save_shipping_detail','CheckoutController@shiping_details_store');
//Login route
Route::post('/customer_login','CheckoutController@customer_login');
//Logout route
Route::get('/customer_logout','CheckoutController@customer_logout');
//payment route
Route::get('/payment','CheckoutController@payment');
// route
Route::post('/order_place','CheckoutController@order_with_cash');



//customer profile view route
Route::get('/profile_view','CheckoutController@profile');
//editing profile route
Route::get('/edit-profile/{customer_id}','CheckoutController@edit_profile');
//editing Password route
Route::get('/edit-password/{customer_id}','CheckoutController@preview_page_password');
//updating Password route
Route::post('/update_password/{customer_id}','CheckoutController@update_password');
//shipping details route
Route::get('/edit-shipping/{shipping_id}','CheckoutController@edit_shipping');
//update profile
Route::post('/update_profile/{customer_id}','CheckoutController@update_customer_profile');
//update customer shipping details
Route::post('/update_shipping_details/{shipping_id}','CheckoutController@update_customer_shipping_details');



//testing brian.........
Route::get('/test_Brain','testingController@bussiness_test' );


//comments routes
Route::get('/chatting_forum','BlogController@comment_now');
//save chat forum route
Route::post('save_forum','BlogController@save');
//leave a reply
Route::post('/reply','BlogController@reply_back');



// Laravel 5.1.17 and above
Route::get('/payment/callback', 'CheckoutController@handleGatewayCallback');


