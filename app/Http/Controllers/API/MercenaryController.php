<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load model
use App\Model\HSTable;

// load helper
use App\Helpers\Mercenary;

class MercenaryController extends Controller
{
	public function __construct()
	{
		// $this->middleware(['auth', 'verified']);
	}

	public function show(HSTable $hstable)
	{
		return [
			'type' => $hstable->Type,
			'str' => Mercenary::get_ability('STR', $hstable->HSID),
			'int' => Mercenary::get_ability('INT', $hstable->HSID),
			'dex' => Mercenary::get_ability('DEX', $hstable->HSID),
			'vit' => Mercenary::get_ability('VIT', $hstable->HSID),
			'mana' => Mercenary::get_ability('MANA', $hstable->HSID),
			'points' => Mercenary::get_ability('POINTS', $hstable->HSID),
		];
	}

	public function list(Request $request)
	{
		foreach (HSTable::whereNull('HSState', 1)->whereNull('DelDate')->where('HSName', 'like', '%'.$request->term.'%')->get() as $k) {
			// $data[] = $k->c_id;
			$data[] = [
				'label' => $k->HSName.' => '.config('a3.merc'.$k->Type),
				'value' => $k->HSID,
				'type' => config('a3.merc'.$k->Type)
			];
		}
		return $data;
	}

}
