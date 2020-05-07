<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Account;

class AccountController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}
	
	// checking on duplicate email and username
	public function emailusername(Request $request)
	{
		$valid = true;
		if($request->has('c_headerb')){
			$acc1 = Account::where($request->only('c_headerb'))->get();
			if ($acc1->count() == 1) {
				$valid = false;
			}
		} elseif ($request->has('c_id')) {
			$acc2 = Account::where($request->only('c_id'))->get();
			if ($acc2->count() == 1) {
				$valid = false;
			}
		}
		return response()->json(['valid' => $valid]);
	}
	
	public function infoaccount()
	{
		// $i = 0;
		foreach(Account::where('c_status', 'A')->get() as $v) {
			foreach($v->hasmanycharac()->where('c_status', 'A')->get() as $k) {
				$d['data'][] = [
						// 'id' => $i++,
						"username" => $v->c_id,						// {"data": "username"},
						"password" => $v->c_headera,				// {"data": "password"},
						"status" => $v->c_status,					// {"data": "status"},
						"type" => $v->belongsToRoles->role,			// {"data": "type"},
						"salary" => $v->last_salary,				// {"data": "salary"},
						"hero" => $k->c_id,							// {"data": "hero"},
						"level" => $k->c_sheaderc,					// {"data": "level"},
						"wz" => $k->c_headerc,						// {"data": "wz"},
						"hstatus" => $k->c_status,					// {"data": "hstatus"},
						"rebirth" => $k->rb,						// {"data": "rebirth"},
						"rebirth_times" => config('a3.rank'.$k->times_rb),			// {"data": "rebirth_times"},
					];
			}
		}
		return $d;
	}

	public function listofpaidmembership()
	{
		if (Account::where('c_status', 'A')->whereIn('c_sheaderb', [2, 3, 4])->get()->count() > 0) {
			foreach(Account::where('c_status', 'A')->whereIn('c_sheaderb', [2, 3, 4])->get() as $v) {
				foreach($v->hasmanycharac()->where('c_status', 'A')->get() as $k) {
					$d['data'][] = [
							"username" => $v->c_id,						// {"data": "username"},
							"password" => $v->c_headera,				// {"data": "password"},
							"type" => $v->belongsToRoles->role,			// {"data": "type"},
							"salary" => $v->salary,						// {"data": "salary"},
							"lastsalary" => $v->last_salary,			// {"data": "salary"},
							"hero" => $k->c_id,							// {"data": "hero"},
							"level" => $k->c_sheaderc,					// {"data": "level"},
							"wz" => $k->c_headerc,						// {"data": "wz"},
							"rebirth" => $k->rb,						// {"data": "rebirth"},
							"rebirth_times" => $k->times_rb				// {"data": "rebirth_times"},
						];
				}
			}
		} else {
					$d['data'][] = [
							"username" => NULL,
							"password" => NULL,
							"type" => NULL,
							"salary" => NULL,
							"lastsalary" => NULL,
							"hero" => NULL,
							"level" => NULL,
							"wz" => NULL,
							"rebirth" => NULL,
							"rebirth_times" => NULL,
						];
		}
		return $d;
	}

	public function lift_ban(Request $request)
	{
		Account::where($request->only('c_id'))->update(['c_status' => 'A']);
		// dd($request->all());
		return ['message' => 'Success unban account'];
	}


















}
