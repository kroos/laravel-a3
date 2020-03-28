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

// welcome controller
Route::get('/', 'WelcomeController@index')->name('welcome')->middleware('guest');

Auth::routes(['verify' => true]);
Route::get('register/email', 'Auth\RegisterController@email')->name('remote.email')->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);
