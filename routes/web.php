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
Route::get('/sign_in', 'App\Http\Controllers\UserController@signIn')->name('sign_in');
Route::get('/register', 'App\Http\Controllers\UserController@register')->name('register');
Route::get('/rooms', 'App\Http\Controllers\HRSController@rooms')->name('rooms');
Route::get('/weather', 'App\Http\Controllers\HRSController@fetchMontrealForecast')->name('weather');
Route::get('/my_profile', 'App\Http\Controllers\UserController@myProfile')->name('my_profile');



//actions
Route::post('/create_reservation', 'App\Http\Controllers\ReservationController@createReservation')->name('create_reservation');
Route::post('/validate_sign_in', 'App\Http\Controllers\UserController@validateSignIn')->name('validate_sign_in');
Route::post('/validate_register', 'App\Http\Controllers\UserController@validateRegister')->name('validate_register');
Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::post('/update_email/{id}', 'App\Http\Controllers\UserController@update_email')->name('update_email');
Route::post('/delete','App\Http\Controllers\ReservationController@delete')->name('delete');