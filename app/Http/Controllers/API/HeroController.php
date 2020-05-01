<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    //
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
	    //
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Charac0  $charac0
	 * @return \Illuminate\Http\Response
	 */
	public function show(Charac0 $charac0)
	{
		// $charac0->c_sheaderb;
		// Hero::get_cheadera('STR', $charac0->c_id);
		// Hero::get_cheadera('INT', $charac0->c_id);
		// Hero::get_cheadera('DEX', $charac0->c_id);
		// Hero::get_cheadera('VIT', $charac0->c_id);
		// Hero::get_cheadera('MANA', $charac0->c_id);
		// Hero::get_cheadera('POINTS', $charac0->c_id);

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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Charac0  $charac0
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Charac0 $charac0)
	{
	    //
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Charac0  $charac0
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Charac0 $charac0)
	{
	    //
	}
}
