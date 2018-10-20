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



Route::get('/', 'MioController@getRistoranti');

Route::get('/formRistorante', 'MioController@formRistorante');

Route::get('/ristorante/{nome}', 'MioController@getRistorante');

Route::get('/thankyou', 'MioController@getThankYouPage')->name('thankyou');

Route::post('/dati', 'MioController@dati');
