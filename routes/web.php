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

Route::get('/serverstatus', 'ServerInfoController@serverstatus')->name('serverstatus')->middleware('guest');
Route::get('/playeronline', 'ServerInfoController@playeronline')->name('playeronline')->middleware('guest');

Route::get('/heroesboard', 'BoardController@heroesboard')->name('heroesboard')->middleware('guest');
Route::get('/mercboard', 'BoardController@mercboard')->name('mercboard')->middleware('guest');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);

// resources : not available for middleware
Route::resources(['account' => 'Profile\AccountController']);

// news controller
Route::get('/usernews', 'News\NewsController@index')->name('usernews');







// https://e-hentai.org/?f_search=artist%3A%22azuki+kurenai%24%22%3Blanguage%3A%22english%24%22
// https://e-hentai.org/?f_cats=505&f_search=language%3A%22english%24%22%3Bfemale%3A%22big+breast%24%22%3Bfemale%3A%22milf%24%22%3Bmale%3A%22big+penis%24%22%3Bfemale%3A%22anal%24%22
// https://hdsex.org/video/139501197?utm_source=xdiver&utm_medium=click&utm_campaign=xdiver