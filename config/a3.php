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
];
