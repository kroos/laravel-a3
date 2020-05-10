<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SerialList;

class SerialListController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}
	
	// checking on duplicate email and username
	public function serialnumber(Request $request)
	{
		$valid = true;
		if($request->has('SerialNo')){
			$acc1 = SerialList::where($request->only('SerialNo'))->get();
			if ($acc1->count() == 1) {
				$valid = false;
			}
		}
		return response()->json(['valid' => $valid]);
	}


















}
