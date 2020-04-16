<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load validation
// use App\Http\Requests\ProfileRequest;
// use App\Http\Requests\ChangePasswordRequest;

// load carbon
use Carbon\Carbon;

// load model
use App\Model\Post;

// load session
use Session;

class NewsController extends Controller
{
	function __construct()
	{
		$this->middleware(['auth', 'verified']);
		// $this->middleware('isOwner')->only(['edit', 'update', 'destroy']);
	}

	public function index()
	{
		return view('news.index');
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

	}

	public function update(Request $request, Post $post)
	{

	}

	public function destroy(Post $post)
	{

	}
}
