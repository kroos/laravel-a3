<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load validation for convergmupdate
use App\Http\Requests\ConvertGMRequest;

// load model
use App\Model\Charac0;

// load helper
use App\Helpers\Hero;

class HeroController extends Controller
{
	public function __construct()
	{
		// $this->middleware(['auth', 'verified']);
	}

	public function show(Charac0 $charac0)
	{
		return [
			'type' => $charac0->c_sheaderb,
			'str' => Hero::get_cheadera('STR', $charac0->c_id),
			'int' => Hero::get_cheadera('INT', $charac0->c_id),
			'dex' => Hero::get_cheadera('DEX', $charac0->c_id),
			'vit' => Hero::get_cheadera('VIT', $charac0->c_id),
			'mana' => Hero::get_cheadera('MANA', $charac0->c_id),
			'points' => Hero::get_cheadera('POINTS', $charac0->c_id),
		];
	}

	public function list(Request $request)
	{
		foreach (Charac0::where('c_status', 'A')->where('c_id', 'like', '%'.$request->term.'%')->get() as $k) {
			// $data[] = $k->c_id;
			$data[] = [
				'label' => $k->c_id.' => '.config('a3.hero'.$k->c_sheaderb),
				'value' => $k->c_id,
				'type' => config('a3.hero'.$k->c_sheaderb)
			];
		}
		return $data;
	}

	public function convertgmupdate(ConvertGMRequest $request)
	{
		// dd($request->except('_token'));
		Charac0::find($request->c_id)->belongstoaccount()->update($request->only('c_sheaderb'));
		return [
			'message' => 'Success convert account.'
		];
	}




}
