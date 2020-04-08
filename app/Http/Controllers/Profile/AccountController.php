<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load validation
use App\Http\Requests\ProfileRequest;

// load model
use App\Model\Account;

// load session
use Session;

class AccountController extends Controller
{
	function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('isOwner')->only(['edit', 'update']);
	}

	public function index()
	{
		return view('account.index');
	}

	public function create()
	{
	    //
	}

	public function store(ProfileRequest $request)
	{
	    //
	}

	public function show(Account $account)
	{
	    //
	}

	public function edit(Account $account)
	{
		return view('account.edit', compact(['account']));
	}

	public function update(ProfileRequest $request, Account $account)
	{
		$account->update( $request->except(['_method', '_token']) );
		Session::flash('flash_message', 'Data successfully updated!');
		return redirect(route('account.index'));
	}

	public function destroy(Account $account)
	{
			return response()->json([
				'message' => 'Account Deactivated',
				'status' => 'success'
			]);
	}
}
