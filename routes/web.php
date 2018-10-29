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
Route::get('/formRistorante', 'PublicController@formRistorante');
Route::get('/ristorante/{nome}', 'PublicController@getRistorante');
Route::get('/thankyou', 'PublicController@getThankYouPage')->name('thankyou');
Route::post('/dati', 'PublicController@dati');
Route::get('/showproducts', 'PublicController@showProducts');
Route::delete('/delete/{id}', 'PublicController@deleteProduct');

Route::get('/formproduct', 'InsertController@index');
Route::post('/store', 'InsertController@store');

Route::get('/show/{id}', 'ShowController@showProduct');
Route::post('/update/{id}', 'ShowController@editProduct');
