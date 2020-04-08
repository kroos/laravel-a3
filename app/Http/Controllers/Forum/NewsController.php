<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// load model
use App\Model\Post;

class NewsController extends Controller
{
	function __construct()
	{

	}

	public function index()
	{
		return view('forum.news.index');
	}

	public function create()
	{
	    //
	}

	public function store(Request $request)
	{
	    //
	}

	public function show(Post $post)
	{
	    //
	}

	public function edit(Post $post)
	{
	    //
	}

	public function update(Request $request, Post $post)
	{
	    //
	}

	public function destroy(Post $post)
	{
	    //
	}
}