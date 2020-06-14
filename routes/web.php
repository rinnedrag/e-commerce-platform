<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->group(function (){
    Route::prefix('/products')->group(function (){
        Route::get('/new', 'AdminPageController@newProductPage');
        Route::get('/list/{id}', 'AdminPageController@getProduct');
        Route::put('/list/{id}', 'AdminPageController@updateProduct');
        Route::delete('/list/{id}', 'AdminPageController@deleteProduct');
        Route::get('/list', 'AdminPageController@productList');
        Route::post('/create', 'AdminPageController@createProduct');
    });
    Route::get('/orders', 'AdminPageController@getOrders');
    Route::get('/orders/{id}', 'AdminPageController@getOrderPage');
    Route::put('/orders/{id}/update/status', 'AdminPageController@updateOrderStatus');
    Route::get('/broadcast', 'AdminPageController@broadcast');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/catalog', 'HomeController@catalogPage');
Route::get('/catalog/filters', 'HomeController@catalogData');
Route::get('/profile', 'HomeController@profile');
Route::get('/product/{id}', 'HomeController@productPage');
Route::get('/product/{id}/data', 'HomeController@productData');

Route::get('/checkout', 'PaymentController@checkout');
Route::post('/pay', 'PaymentController@pay');
Route::get('/payment', 'PaymentController@paymentPage');

Route::prefix('/orders')->group(function() {
    Route::post('/create', 'OrderController@create');
    Route::get('/{id}', 'OrderController@getOrder');
    Route::get('', 'OrderController@getOrders');
    Route::put('/pay/{id}', 'OrderController@pay');
});

Route::prefix('/cart')->group(function () {
    Route::get('', 'CartController@cart');
    Route::post('/add/{id}', 'CartController@addTo');
    Route::put('/update/{id}', 'CartController@update');
    Route::delete('/delete/{id}', 'CartController@deleteFrom');
});

Route::get('/broadcast', 'BroadcastController@videochatPage')->middleware('auth')->middleware('role:user');;
Route::post('/video/save', 'BroadcastController@saveVideoLink');
