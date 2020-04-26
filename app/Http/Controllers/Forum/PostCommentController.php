<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// load model
use App\Model\PostComment;

// load validation
use App\Http\Requests\PostCommentRequest;

// load carbon
use Carbon\Carbon;

use Session;

// load helper
use Illuminate\Support\Arr;

class PostCommentController extends Controller
{
	function __construct()
	{
		$this->middleware('auth', ['only' => ['store', 'edit', 'update', 'destroy']]);
		$this->middleware('ownComment', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function index()
	{

	}

	public function create()
	{

	}

	public function store(PostCommentRequest $request)
	{
		// dd($request->all());
	    \Auth::user()->hasmanycomment()->create($request->only(['comment', 'post_id']));
		Session::flash('flash_message', 'Comment submitted!');
		return redirect(route('post.show', $request->post_id));
	}

	public function show(PostComment $postComment)
	{

	}

	public function edit(PostComment $postComment)
	{
		return view('postcategory.post.postcomment.edit', compact(['postComment']));
	}

	public function update(Request $request, PostComment $postComment)
	{
		$postComment->update($request->only(['comment']));
		Session::flash('flash_message', 'Post edit submitted!');
		return redirect(route('post.show', $postComment->belongstopost->id));
	}

	public function destroy(PostComment $postComment)
	{
		$postComment->delete();
		return response()->json([
			'message' => 'Comment Deleted',
			'status' => 'success'
		]);

	}
}