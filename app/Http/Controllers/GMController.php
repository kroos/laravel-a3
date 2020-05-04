<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

// load validation
use App\Http\Requests\ConvertPMRequest;
use App\Http\Requests\BanAccountRequest;

// load helper
use App\Helpers\Hero;
use App\Helpers\Mercenary;

// load carbon
use Carbon\Carbon;

// load model
use App\Model\Account;
use App\Model\Charac0;
use App\Model\HSTable;
use App\Model\HS;

// load session
use Session;

// use Carbon;
use CarbonPeriod;

class GMController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('ownByGM');
	}

	public function infoaccount()
	{
		return view('gm.infoaccount');
	}

	public function convertgm()
	{
		return view('gm.convertgm');
	}

	public function cpmcreate()
	{
		return view('gm.convertpaidmembership');
	}

	public function cpmstore(ConvertPMRequest $request)
	{
		Charac0::find($request->c_id)->belongstoaccount()->update([
			'c_sheaderb' => $request->c_sheaderb,
			'last_salary' => Carbon::now()->addMonths($request->dur),
		]);
		Session::flash('flash_message', 'Success update data.');
		return redirect(route('convertpaidmembership.create'));
	}

	public function listpm()
	{
		return view('gm.listpaidmembership');
	}

	public function bancreate()
	{
		return view('gm.banaccount');
	}

	public function banstore(BanAccountRequest $request)
	{
		if($request->ban == 1) {
			// temporary ban
			Charac0::find($request->c_id)->belongstoaccount()->update([
				'c_status' => 'X',
				'c_sheaderc' => 'ban_account'
			]);
			$msg = 'Success temporary ban people.';
		} else {
			$acc = Charac0::find($request->c_id)->belongstoaccount()->get();
			// dd($acc);
			// delete itemstorage
			$acc->hasonestorage()->delete();

			// delete mercenary & friends
			foreach($acc->hasmanycharac->get() as $k) {
				$k->hasmanyhsstonetable()->delete();
				$k->hasmanyhstable()->delete();
				$k->hasmanyfriend()->delete();
			}

			// delete all charac0
			$acc->hasmanycharac()->delete();
			// finally delete account
			$acc->delete();
			$msg = 'Success DELETING account';
		}
		Session::flash('flash_message', $msg);
		return redirect(route('banaccount.create'));
	}

	public function unbanaccount ()
	{
		return view('gm.unbanaccount');
	}

























}