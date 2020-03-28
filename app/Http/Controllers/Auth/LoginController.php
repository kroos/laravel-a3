<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	* Where to redirect users after login.
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
		$this->middleware('guest')->except('logout');
	}

	public function username()
	{
		return 'c_id';
	}

	// for password
	public function getAuthPassword()
	{
		return $this->c_headera;
	}

	protected function validateLogin(Request $request)
	{
		$request->validate([
			$this->username() => 'required|string|min:8|exists:Account,c_id,c_status,A',						// rules
			'c_headera' => 'required|string|min:8',
			'remember' => 'bool',
		], [
			'c_id.exists' => 'The selected account is invalid or the account has been disabled or banned.'		// messages
		], [
			'c_id' => 'Username',																				// attributes
			'c_headera' => 'Password',
			'c_sheadera' => 'Name',
			'c_headerb' => 'E-Mail Address'
		]);
	}
	protected function credentials(Request $request)
	{
		return $request->only($this->username(), 'c_headera');
	}

	public function validateCredentials(UserContract $user, array $credentials)
	{
		$plain = $credentials['c_headera'];
		// dd($plain, $user->getAuthPassword());
		if ($plain == $user->getAuthPassword()) {
			return true;
		} else {
			return false;
		}
		// return $this->hasher->check($plain, $user->getAuthPassword());
	}
}