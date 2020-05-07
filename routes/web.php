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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// user
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

// mercenary reset rebirth
Route::get('mercenary_reset_rebirth/{mercenary_reset_rebirth}/edit', 'NormalController@mercenaryresetrebirthedit')->name('mercenaryresetrebirth.edit');
Route::patch('mercenary_reset_rebirth/{mercenary_reset_rebirth}', 'NormalController@mercenaryresetrebirthupdate')->name('mercenaryresetrebirth.update');

// hero points editing
Route::get('hero_points/{hero_points}/edit', 'NormalController@heropointsedit')->name('heropoints.edit');
Route::patch('hero_points/{hero_points}', 'NormalController@heropointsupdate')->name('heropoints.update');

// mercenary points editing
Route::get('mercenary_points/{mercenary_points}/edit', 'NormalController@mercenarypointsedit')->name('mercenarypoints.edit');
Route::patch('mercenary_points/{mercenary_points}', 'NormalController@mercenarypointsupdate')->name('mercenarypoints.update');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// vip
// salary
Route::get('salary/{salary}/edit', 'VipController@salaryedit')->name('salary.edit');
Route::patch('salary/{salary}', 'VipController@salaryupdate')->name('salary.update');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// gm
// info account
Route::get('info_account', 'GMController@infoaccount')->name('infoaccount.index');

// convert to gm
Route::get('convert_gm', 'GMController@convertgm')->name('convertgm.edit');

// convert to paid membership
Route::get('convert_paid_membership', 'GMController@cpmcreate')->name('convertpaidmembership.create');
Route::post('convert_paid_membership', 'GMController@cpmstore')->name('convertpaidmembership.store');

// convert to paid membership
Route::get('list_paid_membership', 'GMController@listpm')->name('listpm.index');

// convert to paid membership
Route::get('ban_account', 'GMController@bancreate')->name('banaccount.create');
Route::post('ban_account', 'GMController@banstore')->name('banaccount.store');

// unban account
Route::get('unban_account', 'GMController@unbanaccount')->name('unbanaccount.index');

// hero edit points
Route::get('hero_edit_points', 'GMController@heroeditpointscreate')->name('heroeditpoints.create');
Route::post('hero_edit_points', 'GMController@heroeditpointsstore')->name('heroeditpoints.store');

// mercenary edit points
Route::get('mercenary_edit_points', 'GMController@merceditpointscreate')->name('merceditpoints.create');
Route::post('mercenary_edit_points', 'GMController@merceditpointsstore')->name('merceditpoints.store');

// equip armor
Route::get('equip_armor', 'GMController@equiparmorcreate')->name('equiparmor.create');
Route::post('equip_armor', 'GMController@equiparmorstore')->name('equiparmor.store');

// equip passive skill
Route::get('learn_passive_skill', 'GMController@learnpsvskillcreate')->name('learnpsvskill.create');
Route::post('learn_passive_skill', 'GMController@learnpsvskillstore')->name('learnpsvskill.store');

// mercenary equip armor
Route::get('mercenary_equip_armor', 'GMController@mercequiparmorcreate')->name('mercequiparmor.create');
Route::post('mercenary_equip_armor', 'GMController@mercequiparmorstore')->name('mercequiparmor.store');

// mercenary equip passive skill
Route::get('mercenary_learn_passive_skill', 'GMController@merclearnpsvskillcreate')->name('merclearnpsvskill.create');
Route::post('mercenary_learn_passive_skill', 'GMController@merclearnpsvskillstore')->name('merclearnpsvskill.store');

// equip super super shue
Route::get('equip_super_super_shue', 'GMController@equipsupersupershuecreate')->name('equipsupersupershue.create');
Route::post('equip_super_super_shue', 'GMController@equipsupersupershuestore')->name('equipsupersupershue.store');

// learn episode 5 skill
Route::get('learn_epi5_skill', 'GMController@learnepi5skillcreate')->name('learnepi5skill.create');
Route::post('learn_epi5_skill', 'GMController@learnepi5skillstore')->name('learnepi5skill.store');

// edit level
Route::get('edit_level', 'GMController@editlevelcreate')->name('editlevel.create');
Route::post('edit_level', 'GMController@editlevelstore')->name('editlevel.store');

// merc edit level
Route::get('merc_edit_level', 'GMController@merceditlevelcreate')->name('merceditlevel.create');
Route::post('merc_edit_level', 'GMController@merceditlevelstore')->name('merceditlevel.store');

// edit lore
Route::get('edit_lore', 'GMController@editlorecreate')->name('editlore.create');
Route::post('edit_lore', 'GMController@editlorestore')->name('editlore.store');

// edit lore
Route::get('insert_grace_of_silbadu', 'GMController@insertgraceofsilbaducreate')->name('insertgraceofsilbadu.create');
Route::post('insert_grace_of_silbadu', 'GMController@insertgraceofsilbadustore')->name('insertgraceofsilbadu.store');










// https://e-hentai.org/?f_search=artist%3A%22azuki+kurenai%24%22%3Blanguage%3A%22english%24%22
// https://e-hentai.org/?f_cats=505&f_search=language%3A%22english%24%22%3Bfemale%3A%22big+breast%24%22%3Bfemale%3A%22milf%24%22%3Bmale%3A%22big+penis%24%22%3Bfemale%3A%22anal%24%22
// https://hdsex.org/video/139501197?utm_source=xdiver&utm_medium=click&utm_campaign=xdiver