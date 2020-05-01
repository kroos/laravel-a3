<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

// load validation
use App\Http\Requests\OfflineTownPortalRequest;
use App\Http\Requests\AcquireSuperShueRequest;
use App\Http\Requests\BuyLoreRequest;
use App\Http\Requests\HeroStatRequest;
use App\Http\Requests\MercenaryStatRequest;
use App\Http\Requests\MercenaryRebirthRequest;

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

class VipController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('ownSalary')->only(['salaryedit', 'salaryupdate']);
	}

	public function salaryedit(Account $salary)
	{
		return view('vip.salary', compact(['salary']));
	}

	public function salaryupdate(Request $request, Account $salary)
	{
		$hero = $salary->hasmanycharac()->where('c_id', $request->c_id);
		$vip = $salary->c_sheaderb;
		$swz = $hero->first()->c_headerc;
		$dtsal = Carbon::parse($salary->salary);
		$dtlsal = Carbon::parse($salary->last_salary);
		$now = Carbon::now();

		$wzsalary = config('a3.'.$salary->c_sheaderb);
		$salpm = $swz + $wzsalary;

		$monthsal = $dtsal->copy()->diffInMonths($dtlsal);

		// date legal before salary
		$datelegalsalary = $dtlsal->copy()->subMonths($monthsal);

		$datelegalnow =  $now->copy()->diffInMonths($datelegalsalary);

		$datelegaltakesal = $now->copy()->subMonths($datelegalnow);

		// dd($monthsal, $datelegalsalary, $datelegalnow, $datelegaltakesal);

		if ($monthsal <= 0) {
			if($vip != 1) {
				$salary->update(['c_sheaderb' => 5]);
			}
			$msg = 'It seems your subscription expired. Please contact Game Master to conftinue the subscription. We are thankful so much for your support to us all this long';
		} elseif ($salpm > 4200000000) {
			$msg = 'Please choose another hero as it seems it cant hold more than 4.2billion Wz';
		} elseif ($now <= $datelegalsalary) {
			$msg = 'You have taken the salary for this month. Please wait till next month';
		} else {
			$salary->update([
				'salary' => $datelegaltakesal
			]);
			$hero->update([
				'c_headerc' => $salpm
			]);
			$msg = 'Success claim salary';
		}

		Session::flash('flash_message', $msg);
		return redirect(route('salary.edit', \Auth::user()->c_id));
	}

}