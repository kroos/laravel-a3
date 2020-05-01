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

// API AJAX Controller (not supposed to be here, supposed to be in API route)
Route::get('remote/emailusername', 'API\AccountController@emailusername')->name('remote.emailusername');

Route::post('charac0/{charac0}', 'API\HeroController@show')->name('hero.show');
Route::post('hstable/{hstable}', 'API\MercenaryController@show')->name('mercenary.show');

