<?php

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

// pages
Route::get('/', 'App\Http\Controllers\HRSController@index')->name('home'); 
Route::get('/reserve', 'App\Http\Controllers\HRSController@reserve')->name('reserve');
Route::get('/sign_in', 'App\Http\Controllers\HRSController@signIn')->name('sign_in');
Route::get('/register', 'App\Http\Controllers\HRSController@register')->name('register');
Route::get('/rooms', 'App\Http\Controllers\HRSController@rooms')->name('rooms');
Route::get('/weather', 'App\Http\Controllers\HRSController@fetchMontrealForecast')->name('weather');
Route::get('/my_profile', 'App\Http\Controllers\HRSController@myProfile')->name('my_profile');



//actions
Route::post('/create_reservation', 'App\Http\Controllers\HRSController@createReservation')->name('create_reservation');
Route::post('/validate_sign_in', 'App\Http\Controllers\HRSController@validateSignIn')->name('validate_sign_in');
Route::post('/validate_register', 'App\Http\Controllers\HRSController@validateRegister')->name('validate_register');
Route::post('/logout', 'App\Http\Controllers\HRSController@logout')->name('logout');
Route::post('/update_email', 'App\Http\Controllers\HRSController@update_email')->name('update_email');