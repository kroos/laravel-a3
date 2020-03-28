<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use \Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'c_id' => ['required', 'string', 'min:8', 'unique:Account'],
            'c_sheadera' => ['required', 'string', 'max:255'],
            'c_headerb' => ['required', 'string', 'email', 'max:255', 'unique:Account'],
            'c_headera' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'c_id.unique' => 'Please use another Username.',
            'c_headerb.unique' => 'Please use another Email Address.',
        ],
        [
            'c_id' => 'Username',                                                                               // attributes
            'c_headera' => 'Password',
            'c_sheadera' => 'Name',
            'c_headerb' => 'E-Mail Address'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        return Account::create([
            'c_id' => $data['c_id'],
            'c_sheadera' => $data['c_sheadera'],
            'c_headerb' => $data['c_headerb'],
            'c_headera' => $data['c_headera'],
            'c_sheaderb' => 5,
            'c_sheaderc' => 'banned_password',
            'c_headerc' => Str::random(60),                                                                    // RjBb9vr6wCOySXeGdu7wyC7jwWEy5ofQ1YIvLiO2KKvgGxKh5CEn50hSrCQx
            'c_status' => 'A',
            'm_body' => 'reserve',
            'salary' => Carbon::now(),
            'last_salary' => Carbon::now()
        ]);
    }

    public function email(Request $request)
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
