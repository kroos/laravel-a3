<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

// load model
use App\Model\Charac0;


class ServerInfoController extends Controller
{
	function __construct()
	{
		
	}

	public function serverstatus()
	{
		return view('serverstatus');
	}

	public function playeronline()
	{
		$time = DB::select("SELECT DATEADD(minute, ".config('a3.minutesago').", GETDATE()) AS hourago");
		// dd($time);
		$query = DB::table('Charac0')
				->where('c_status', 'A')
				->whereRaw('[d_udate] >= CONVERT(datetime, \''.last($time)->hourago.'\', 102)')
				->orderBy('d_udate', 'DESC')
				->get();
		return view('playeronline', ['q' => $query]);
	}

}