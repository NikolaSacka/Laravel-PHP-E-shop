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

Route::get('/', function () {
    return view('welcome');
});
Route::get('about', function () {
    return view('about');
});
Route::get('shop', function () {
    return view('shop');
});
Route::get('design', function () {
    return view('design');
});
//PUT POST GET DELETE
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

Route::get('/product-add','ProductAddController@index');
Route::get('/product-add/create','ProductAddController@create')->middleware('auth');
Route::get('/product-add/{ProductAdd}/edit','ProductAddController@edit')->middleware('auth');;
Route::post('/product-add','ProductAddController@store')->middleware('auth');;
Route::get('/shop','ProductAddController@display')->middleware('auth');

Route::put('/product-add/{ProductAdd}','ProductAddController@update');

Route::get('/add-to-cart/{ProductAdd}', 'ProductAddController@AddToCart')
    ->name('cart.index')
    ->middleware('auth');

Route::get('/cart', 'ProductAddController@cart')
    ->name('cart.index')
    ->middleware('auth');


Route::patch('/update-cart', 'ProductAddController@updatecart');

Route::delete('/remove-from-cart', 'ProductAddController@remove');


Route::patch('checkout/{order}/deliver','ProductAddController@deliverOrder');
Route::get('/checkout', 'ProductAddController@testcheckout');



//Route::get('/add-to-cart/{ProductAdd}',[
//    'uses'=>'ProductAddController@AddToCart',
//    'as'=>'product.AddToCart']);
