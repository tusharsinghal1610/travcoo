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


Route::get('/','productController@isTrending');
Route::get('/home','productController@isTrending');
Route::get('/register','userController@create');
Route::post('/register','userController@store');
Route::post('/login','userController@checkLogin');
Route::get('/productDetails/sendToCart','cartController@sendToCart');
Route::get('/productDetails/{id}','productController@details');
Route::get('/cart','cartController@displayCart');
Route::get('/filterSubmit','productController@filter');
Route::get('/search/{searchKey}','productController@search');
Route::get('/searchSubmit/{searchKey}','productController@searchSubmit');
Route::get('/deleteFromCart','cartController@deleteFromCart');
Route::get('/changeQuantity','cartController@changeQuantity');
Route::get('/getAddress','userController@showAddressPage');
Route::post('/submitAddress','userController@getAddress');
Route::get('/uploadProduct',function(){
return view('product.uploadProduct');
});
Route::post('/uploadProduct','productController@upload');