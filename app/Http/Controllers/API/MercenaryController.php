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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Charac0  $charac0
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, HSTable $hstable)
	{
	    //
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Charac0  $charac0
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(HSTable $hstable)
	{
	    //
	}
}
