<?php

use App\Product;
use Illuminate\Routing\RouteGroup;
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

Auth::routes();

// Home Route
Route::get('/', 'HomeController@index')->name('home');

// Product Routes
Route::prefix('/product')->group(function () {
  Route::get('/', 'ProductController@index')->name('products.index');
  Route::get('/{slug}', 'ProductController@show')->name('products.show');
  // Route::get('/search', 'ProductController@search')->name('products.search');
});
Route::get('/search', 'ProductController@search')->name('products.search');


Route::group(['middleware' => ['auth']], function () {

  // Cart Routes
  Route::prefix('/cart')->group(function () {
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::post('/add', 'CartController@store')->name('cart.store');
    Route::patch('/{rowId}', 'CartController@update')->name('cart.update');
    Route::delete('/remove/{rowId}', 'CartController@destroy')->name('cart.destroy');
    Route::post('/coupon', 'CartController@storeCoupon')->name('cart.store.coupon');
    Route::delete('/coupon', 'CartController@destroyCoupon')->name('cart.destroy.coupon');
  });

  // Checkout Routes
  Route::prefix('/payment')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('checkout.index');
    Route::post('/', 'CheckoutController@store')->name('checkout.store');
    Route::get('/thankyou', 'CheckoutController@thankyou')->name('checkout.thankyou');
  });

  // Users Routes
  Route::prefix('/users')->group(function () {
    Route::get('/orders', 'UserController@orders')->name('user.orders');
  });

});

// Voyager Routes
Route::group(['prefix' => 'admin'], function () {
  Voyager::routes();
});