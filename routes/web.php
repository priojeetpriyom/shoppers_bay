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

Route::get('/', 'UserController@index')->name('home');
Route::get('user/create', 'UserController@create'); //registration page
Route::post('user/store', 'UserController@store'); //registration process
Route::get('user/profile', 'UserController@show'); //user profile
Route::get('user/destroy', 'UserController@destroy'); //user destroy
Route::post('user/updateimage', 'UserController@updateImage'); //user profile image upload
Route::post('user/update', 'UserController@update'); // user profile update
Route::get('user/edit', 'UserController@edit'); // user profile edit page


Route::get('login', 'SessionController@create'); // login page
Route::post('login', 'SessionController@store'); // login process
Route::get('logout', 'SessionController@destroy'); //logout


Route::get('/product/create', 'ProductController@create'); //create product page
//Route::post('/product/publish', 'ProductController@store');
Route::post('/product/submit', 'ProductController@store'); // create product process


Route::get('/category/load', 'CategoryController@index'); //ajax load category
Route::get('/category/{id}', 'CategoryController@show'); // ajax load products according to category

Route::get('/product/index', 'ProductController@index'); // load default products

Route::post('/addtocart/{pid}', 'CartController@store'); // add a product to cart
Route::get('/updatecart/', 'CartController@index'); //ajax update cart items view
Route::get('/updatecartitemscount', 'CartController@updateCartItemsCount'); //ajax update cart items count
Route::get('/cart/remove/{id}', 'CartController@removeItem'); // remove a item from cart

//checkout indicates operations done in checkout page
Route::get('/cart/checkout', 'CartController@show'); // checkout page
Route::get('/cart/checkout/loadproducts', 'CartController@showCheckoutProducts'); //ajax checkout products load
Route::get('/cart/checkout/destroy/{id}', 'CartController@destroy'); // remove a product from checkout
Route::get('/cart/checkout/{id}/{quantity}', 'CartController@updateProductCount'); //cart product count update
Route::get('/cart/checkout/payment', 'CartController@checkoutPayment'); //checkout handle

Route::get('/admin', 'AdminController@index')->name('adminHome');
Route::get('/admin/orders', 'AdminController@showOrders');
Route::get('/admin/profile', 'AdminController@show');
Route::get('/admin/delete/order/{id}', 'AdminController@deleteOrder');

Route::get('orders', 'OrderController@index');

Route::get('/user/recharge', function() {
    return view('order.payment');
});


Route::post('/user/transaction/check', 'TransactionController@check');
Route::get('user/payment/{transaction_id}/{amount}', 'TransactionController@payment');

Route::get('/admin/approve/pendingtransaction/{order}/{user_id}', 'AdminController@approvePendingTransaction');