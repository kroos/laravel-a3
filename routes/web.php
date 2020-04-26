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

// forum
Route::resources(['postCategory' => 'Forum\PostCategoryController']);
Route::resources(['post' => 'Forum\PostController']);
Route::resources(['postComment' => 'Forum\PostCommentController']);

Route::get('/serverstatus', 'ServerInfoController@serverstatus')->name('serverstatus')->middleware('guest');
Route::get('/playeronline', 'ServerInfoController@playeronline')->name('playeronline')->middleware('guest');

Route::get('/heroesboard', 'BoardController@heroesboard')->name('heroesboard')->middleware('guest');
Route::get('/mercboard', 'BoardController@mercboard')->name('mercboard')->middleware('guest');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'verified']);

// resources : not available for middleware
Route::resources(['account' => 'Profile\AccountController']);

// offline town portal
Route::get('offline_town_portal/{offline_town_portal}/edit', 'NormalController@offedit')->name('off.edit');
Route::patch('offline_town_portal/{offline_town_portal}', 'NormalController@offupdate')->name('off.update');

// acquire super shue
Route::get('acquire_super_shue/{acquire_super_shue}/edit', 'NormalController@asshueedit')->name('asshue.edit');
Route::patch('acquire_super_shue/{acquire_super_shue}', 'NormalController@asshueupdate')->name('asshue.update');

// buy all skill
Route::get('buy_all_skill/{buy_all_skill}/edit', 'NormalController@basedit')->name('bas.edit');
Route::patch('buy_all_skill/{buy_all_skill}', 'NormalController@basupdate')->name('bas.update');

// equip super super shue
Route::get('equip_super_super_shue/{equip_super_super_shue}/edit', 'NormalController@essshedit')->name('esssh.edit');
Route::patch('equip_super_super_shue/{equip_super_super_shue}', 'NormalController@essshupdate')->name('esssh.update');

// buy lore
Route::get('buy_lore/{buy_lore}/edit', 'NormalController@buyloreedit')->name('buylore.edit');
Route::patch('buy_lore/{buy_lore}', 'NormalController@buyloreupdate')->name('buylore.update');

// hero rebirth
Route::get('hero_rebirth/{hero_rebirth}/edit', 'NormalController@herorebirthedit')->name('herorebirth.edit');
Route::patch('hero_rebirth/{hero_rebirth}', 'NormalController@herorebirthupdate')->name('herorebirth.update');

// hero reset rebirth
Route::get('hero_reset_rebirth/{hero_reset_rebirth}/edit', 'NormalController@heroresetrebirthedit')->name('heroresetrebirth.edit');
Route::patch('hero_reset_rebirth/{hero_reset_rebirth}', 'NormalController@heroresetrebirthupdate')->name('heroresetrebirth.update');

// mercenary rebirth
Route::get('mercenary_rebirth/{mercenary_rebirth}/edit', 'NormalController@mercenaryrebirthedit')->name('mercenaryrebirth.edit');
Route::patch('mercenary_rebirth/{mercenary_rebirth}', 'NormalController@mercenaryrebirthupdate')->name('mercenaryrebirth.update');

// mercenary rebirth
Route::get('mercenary_reset_rebirth/{mercenary_reset_rebirth}/edit', 'NormalController@mercenaryresetrebirthedit')->name('mercenaryresetrebirth.edit');
Route::patch('mercenary_reset_rebirth/{mercenary_reset_rebirth}', 'NormalController@mercenaryresetrebirthupdate')->name('mercenaryresetrebirth.update');







// https://e-hentai.org/?f_search=artist%3A%22azuki+kurenai%24%22%3Blanguage%3A%22english%24%22
// https://e-hentai.org/?f_cats=505&f_search=language%3A%22english%24%22%3Bfemale%3A%22big+breast%24%22%3Bfemale%3A%22milf%24%22%3Bmale%3A%22big+penis%24%22%3Bfemale%3A%22anal%24%22
// https://hdsex.org/video/139501197?utm_source=xdiver&utm_medium=click&utm_campaign=xdiver