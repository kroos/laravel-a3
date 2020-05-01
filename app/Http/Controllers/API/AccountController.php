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
}
