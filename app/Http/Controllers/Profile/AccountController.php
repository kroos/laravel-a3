<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load validation
use App\Http\Requests\ProfileRequest;

// load carbon
use Carbon\Carbon;

// load model
use App\Model\Account;

// load session
use Session;

class AccountController extends Controller
{
	function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('isOwner')->only(['edit', 'update', 'destroy']);
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
		// dd($request->c_headera);
		if(!is_null($request->c_headera)) {
			if ($request->curr_c_headera == \Auth::user()->c_headera) {
				$account->update( $request->except(['_method', '_token']) );
			} else {
				Session::flash('flash_message', 'Please try again, your current password is not correct!');
				return redirect(route('account.edit', \Auth::user()->c_id));
			}
		} else {
			$account->update( $request->except(['_method', '_token', 'curr_c_headera', 'c_headera', 'c_headera_confirmation']) );
		}
		Session::flash('flash_message', 'Data successfully updated!');
		return redirect(route('account.index'));
	}

	public function destroy(Account $account)
	{
		// disable account
		$account->update(['c_status' => 'X']);

		// disable storage
		$account->hasonestorage()->update(['c_status' => 'X']);

		// disable character and every each of mercenary for every character
		$user = $account->hasmanycharac()->get();
		foreach ($user as $k) {
			$k->update(['c_status' => 'X']);

			// disable every each of mercenary
			$merc = $k->hasmanyhstable()->get();
			foreach ($merc as $y) {
				$y->update(['DelDate' => Carbon::now()]);
			}
		}

		// logout user
		\Auth::logout();
		return redirect(route('welcome'));

		// return response()->json([
		// 	'message' => 'Account Deactivated',
		// 	'status' => 'success'
		// ]);
	}
}
