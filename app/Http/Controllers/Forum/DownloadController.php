<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load model
use App\Model\Post;

class DownloadController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('forum.download.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
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
	 * @param  \App\Model\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
	    //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
	    //
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post)
	{
	    //
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
	    //
	}
}
