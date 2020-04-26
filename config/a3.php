<?php

return [
##################################################################################################
//PAID MEMBERSHIP AND SALARY.
//give the name of your choice for the following paid membership type.

	1 => env('A3_GM', 1500000000),
	2 => env('A3_GOLDM', 1500000000),
	3 => env('A3_SM', 1000000000),
	4 => env('A3_BM', 500000000),

##################################################################################################
//GAMESERVER PORT.
//this is your server IP, mostly you don't need to change this IP if your webhosting is the same with your gameserver
	'srvip' => env('A3_SERVER_IP', '127.0.0.1'),

//zoneserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
	'svrportZone' => env('A3_SERVER_ZONE_PORT', 6689),

//loginserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
	'svrportlogin' => env('A3_SERVER_LOGIN_PORT', 3210),

//battleserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
	'svrportbattle' => env('A3_SERVER_BATTLE_PORT', 6999),

//accountserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
	'svrportaccount' => env('A3_SERVER_ACCOUNT_PORT', 5589),
##################################################################################################
// PLAYER ONLINE
	'minutesago' => env('A3_SERVER_MINUTES_AGO', -59),
##################################################################################################
// PLAYER RANK
	'rank0' => env('A3_SERVER_RANK_0', 'Pawn'),
	'rank1' => env('A3_SERVER_RANK_1', 'Knight'),
	'rank2' => env('A3_SERVER_RANK_2', 'Bishop'),
	'rank3' => env('A3_SERVER_RANK_3', 'King'),
##################################################################################################
// MERCENARY RANK
	'mrank0' => env('A3_SERVER_MERC_RANK_0', 'Mercenary'),
	'mrank1' => env('A3_SERVER_MERC_RANK_1', 'Rogue'),
	'mrank2' => env('A3_SERVER_MERC_RANK_2', 'Fighter'),
	'mrank3' => env('A3_SERVER_MERC_RANK_3', 'Killer'),
	'mrank4' => env('A3_SERVER_MERC_RANK_4', 'Assasin'),
	'mrank5' => env('A3_SERVER_MERC_RANK_5', 'Hitman'),
	'mrank6' => env('A3_SERVER_MERC_RANK_6', 'Reaper'),
##################################################################################################
// acquire super shue
	'wzacquireshue' => env('A3_WZ_ACQUIRE_SHUE', 500000000),
	'levelacquireshue' => env('A3_LEVEL_ACQUIRE_SHUE', 150),
##################################################################################################
// buy all skill
	'wzbuyskill' => env('A3_WZ_BUY_SKILL', 1000000000),
	'levelbuyskill' => env('A3_LEVEL_BUY_SKILL', 150),
##################################################################################################
// equip super super shue
	'wzequipsss' => env('A3_WZ_EQUIP_SUPER_SUPER_SHUE', 500000000),
##################################################################################################
// buy lore
//how much wz you wanna sell for 1 lore, default is 1 lore = 100wz.
	'buy_lore' => env('A3_LORE_PRICE', 100),

//at what rb can start buy lore, default is 5.
	'lore_rb_buy' => env('A3_RB_LORE', 5),
##################################################################################################
// hero rebirth
//at level what player can start use rebirth. default is 150 but be careful. don't make your player have too many stats cos of rebirth system.
	'rebirthlevel' => env('A3_HERO_REBIRTH_LEVEL', 150),

//wz that needed for rebirth.
	'rebirthwz' => env('A3_HERO_REBIRTH_WZ', 100000000),
##################################################################################################
// hero reset rebirth
//at what rebirth level your players can take reset rebirth. default is at rebirth 16.
	'rebirthcount' => env('A3_HERO_REBIRTH_COUNT', 16),

//wz that needed for reset rebirth.
	'resetrebirthwz' => env('A3_HERO_RESET_REBIRTH_WZ', 2000000000),
##################################################################################################
// mercenary rebirth
//at what level mercenary can start rebirth.
	'merclvlrb' => env('A3_MERCENARY_REBIRTH_LEVEL', 150),

//wz needed for rebirth.
	'mercwzrb' => env('A3_MERCENARY_REBIRTH_WZ', 1000000),
##################################################################################################
// mercenary reset rebirth
//at what level your player's mercenary can start using reset rb for their mercenary.
	'mercresetlvl' => env('A3_MERCENARY_RESET_LEVEL', 300),

//at what level rebirth your player merceneray can use rebirth.
	'mercrblevel' => env('A3_MERCENARY_RESET_REBIRTH_COUNT', 16),

//wz needed for merc reset level
	'mercwzreset' => env('A3_MERCENARY_RESET_REBIRTH_WZ', 2000000000),
##################################################################################################
// heroes type
	'hero0' => 'Warrior',
	'hero1' => 'Holy Knight',
	'hero2' => 'Mage',
	'hero3' => 'Archer',
##################################################################################################
// mercenary type
	'merc0' => 'Warrior',
	'merc1' => 'Holy Knight',
	'merc2' => 'Mage',
	'merc3' => 'Archer',
##################################################################################################
	// shue for hero
	'shero0' => "1012;76684069;4152360961;4294160367",
	'shero1' => "1013;76290853;4152360961;4294160495",
	'shero2' => "1014;75897637;4152360961;4294160379",
	'shero3' => "1015;76028709;4152360961;4294160367",
##################################################################################################
	// skill for hero
	'skhero0' => "4294967166;4294967166;4294967166",
	'skhero1' => "1065353214;1065353214;1065353214",
	'skhero2' => "4290723710;4290723710;4290723710",
	'skhero3' => "131070;65534;65534",
##################################################################################################
	// super super shue
	'ssshuehero0' => '1012;76684069;4290773247;4293968751',
	'ssshuehero1' => '1013;76290853;4290773247;4294155503',
	'ssshuehero2' => '1014;75897637;4290773247;4293970555',
	'ssshuehero3' => '1015;76028709;4290773247;4294160367',
##################################################################################################

















];








