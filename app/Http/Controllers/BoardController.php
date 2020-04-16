<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

// load model
use App\Model\Charac0;


class BoardController extends Controller
{
	function __construct()
	{
		
	}

	public function heroesboard()
	{
		$heroes = DB::table('Charac0')
				->select('Charac0.c_id AS char', 'Charac0.c_sheaderb AS type', 'Charac0.c_sheaderc AS level', 'Charac0.d_udate AS dlogin', 'Charac0.rb', 'Charac0.times_rb AS rank', 'CharInfo.Nation AS nat')
				->join('Account', 'Charac0.c_sheadera', '=', 'Account.c_id')
				->join('CharInfo', 'Charac0.c_id', '=', 'CharInfo.CharName')
				->where('Charac0.c_status', 'A')
				->where('Account.c_sheaderb', '<>', 1)
				->where('Account.c_status', 'A')
				->orderBy('Charac0.times_rb', 'desc')
				->orderBy('Charac0.rb', 'desc')
				->orderBy('Charac0.c_sheaderc', 'desc')
				->orderBy('Charac0.d_udate', 'desc')
				->get();

		return view('heroesboard', ['h' => $heroes]);
	}

	public function mercboard()
	{
		// DB::enableQueryLog();
		// tak berapa betul ni. kena edit lagi bila data dah banyak
		$mercenaries = DB::table('Account')
					->select('Charac0.c_id as MasterName', 'HSTABLE.HSName AS HSName', 'HSTABLE.HSLevel AS HSLevel', 'HSTABLE.Type AS Type', 'HS.rb AS rb', 'HS.reset_rb AS reset_rb')
					->join('Charac0', 'Account.c_id', '=', 'Charac0.c_sheadera')
					->join('HSTABLE', 'Charac0.c_id', '=', 'HSTABLE.MasterName')
					->join('HS', 'Charac0.c_id', '=', 'HS.MasterName', 'left outer')	// left outer, left inner, right outer, right inner, inner, outer | the sixth operator is $where = false
					->where('Account.c_status', 'A')
					->where('Account.c_sheaderb', '<>', 1)
					->where('Charac0.c_status', 'A')
					->whereNull ('HSTABLE.DelDate')
					->orderBy('HS.reset_rb', 'DESC')
					->orderBy('HS.rb', 'DESC')
					->orderBy('HSTABLE.HSLevel', 'DESC')
					->get();
		// dd(DB::getQueryLog());
		return view('mercenariesboard', ['m' => $mercenaries]);
	}

}