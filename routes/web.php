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

//actions
Route::post('/create_reservation', 'App\Http\Controllers\HRSController@createReservation')->name('create_reservation');
