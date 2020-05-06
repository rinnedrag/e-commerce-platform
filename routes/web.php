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

        Route::post('/create', 'AdminPageController@createProduct');
    });
});


Route::get('/catalog', 'FootwearController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/catalog', 'HomeController@catalog');
Route::get('/profile', 'HomeController@profile');
Route::get('/product/{id}', 'HomeController@productPage');

Route::prefix('/cart')->group(function () {
    Route::get('', 'CartController@cart');
    Route::post('/add/{id}', 'CartController@addTo');
    Route::put('/update/{id}', 'CartController@update');
    Route::delete('/delete/{id}', 'CartController@deleteFrom');
});

Route::get('/broadcast', 'BroadcastController@videochatPage');
