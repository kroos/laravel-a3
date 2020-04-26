<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// load model
use App\Model\PostCategory;

class PostCategoryController extends Controller
{
	function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
	}

	public function index()
	{
		//
	}

	public function create()
	{
	    //
	}

	public function store(Request $request)
	{
	    //
	}

	public function show(PostCategory $postCategory)
	{
		return view('postcategory.show', compact(['postCategory']));
	}

	public function edit(PostCategory $postCategory)
	{
	    //
	}

	public function update(Request $request, PostCategory $postCategory)
	{
	    //
	}

	public function destroy(PostCategory $postCategory)
	{
	    //
	}
}