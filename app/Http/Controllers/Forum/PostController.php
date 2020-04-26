<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load validation
use App\Http\Requests\PostRequest;

// load model
use App\Model\Post;

// load carbon
use Carbon\Carbon;

use Session;

// load helper
use Illuminate\Support\Arr;

class PostController extends Controller
{
	function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
		$this->middleware('ownPost', ['only' => ['edit', 'update', 'destroy']]);
		// $this->middleware('isGM', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function index()
	{

	}

	public function create()
	{
		return view('postcategory.post.create');
	}

	public function store(PostRequest $request)
	{
		\Auth::user()->hasmanypost()->create($request->only(['subject', 'post', 'category_id']));
		Session::flash('flash_message', 'Post submitted!');
		return redirect(route('postCategory.show', $request->category_id));
	}

	public function show(Post $post)
	{
	    return view('postcategory.post.show', compact(['post']));
	}

	public function edit(Post $post)
	{
		return view('postcategory.post.edit', compact(['post']));
	}

	public function update(PostRequest $request, Post $post)
	{
		$post->update($request->only(['subject', 'post', 'category_id']));
		Session::flash('flash_message', 'Post edit submitted!');
		return redirect(route('post.show', $post->id));
	}

	public function destroy(Post $post)
	{
		$post->hasmanycomment()->delete();
		$post->delete();
		return response()->json([
			'message' => 'Post Deleted',
			'status' => 'success'
		]);
	}
}