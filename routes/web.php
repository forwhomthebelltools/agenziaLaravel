<?php

use Illuminate\Http\Request;

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


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'PublicController@getRistoranti');
Route::get('/ristorante/{nome}', 'PublicController@getRistorante');
Route::get('/thankyou', 'PublicController@getThankYouPage')->name('thankyou');
Route::post('/dati', 'PublicController@contactMail');


Route::get('/showproducts', 'ProductController@showProducts');
Route::get('/formproduct', 'ProductController@insertProductForm');
Route::post('/storeproduct', 'ProductController@storeProduct');
Route::delete('/deleteproduct/{id}', 'ProductController@deleteProduct');
Route::put('/editproduct/{id}', 'ProductController@editProduct');


Route::get('/modifyproduct/{id}', 'ShowController@showProduct');


Route::delete('/deletecomment/{id}', 'CommentController@deleteComment');
Route::post('/insertcomment/{id}', 'CommentController@insertComment');
