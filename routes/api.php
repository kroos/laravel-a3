<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API AJAX Controller
Route::get('remote/emailusername', 'API\AccountController@emailusername')->name('remote.emailusername');

Route::post('charac0/{charac0}', 'API\HeroController@show')->name('hero.show');
Route::post('hstable/{hstable}', 'API\MercenaryController@show')->name('mercenary.show');

// gm info account
Route::post('infoaccount', 'API\AccountController@infoaccount')->name('infoaccount.index');

// convert gm
Route::post('convert_gm', 'API\HeroController@list')->name('list.index');

// testing on submit form through ajax
Route::post('convert_gm_update', 'API\HeroController@convertgmupdate')->name('convertgm.update');

// gm list of paid membership
Route::post('listofpaidmembership', 'API\AccountController@listofpaidmembership')->name('listofpaidmembership.index');

// unban account
Route::post('unban_account', 'API\AccountController@lift_ban')->name('liftban.store');











