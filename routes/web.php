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
// API AJAX Controller
Route::get('remote/email', 'API\AccountController@emailusername')->name('remote.emailusername');

// welcome controller
Route::get('/', 'WelcomeController@index')->name('welcome')->middleware('guest');
Route::get('/news', 'Forum\NewsController@index')->name('news')->middleware('guest');
Route::get('/announcement', 'Forum\AnnouncementController@index')->name('announcement')->middleware('guest');
Route::get('/download', 'Forum\DownloadController@index')->name('download')->middleware('guest');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);

// resources : not available for middleware
Route::resources(['account' => 'Profile\AccountController']);
Route::get('account/password', 'Profile\AccountController@password')->name('account.password');


// https://e-hentai.org/?f_search=artist%3A%22azuki+kurenai%24%22%3Blanguage%3A%22english%24%22
// https://e-hentai.org/s/be2a9968a8/1552952-140
// https://e-hentai.org/?f_cats=505&f_search=language%3A%22english%24%22%3Bfemale%3A%22big+breast%24%22%3Bfemale%3A%22milf%24%22%3Bmale%3A%22big+penis%24%22%3Bfemale%3A%22anal%24%22