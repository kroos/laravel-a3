<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable implements MustVerifyEmail
 {
	use Notifiable;

	protected $connection = 'sqlsrv';
	protected $table = 'Account';
	protected $primaryKey = 'c_id';
	public $incrementing = false;
	protected $keyType = 'string';
	const CREATED_AT = 'd_cdate';
	const UPDATED_AT = 'd_udate';
	protected $rememberTokenName = 'c_headerc';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'c_id',
		'c_sheadera',
		'c_headerb',
		'c_headera',
		'c_sheaderb',
		'c_sheaderc',
		'c_headerc',
		'c_status',
		'm_body',
		'salary',
		'last_salary'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'c_headera',	// password
		'c_headerc',	// remember_token
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getAuthIdentifierName()
	{
		return 'c_id';
	}

	// for password
	public function getAuthPassword()
	{
		return $this->c_headera;
		// return 'c_headera';
		// return $this->attributes['c_headera'];
	}

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
	public function getEmailForPasswordReset()
	{
		return $this->c_headerb;
	}

	// yang ni penting untuk hantaq email
	public function routeNotificationForMail($notification)
	{
		return $this->c_headerb;
	}


//////////////////////////////////////////////////////////////////////////////////
	// relation
//////////////////////////////////////////////////////////////////////////////////
	// acl

	// public function isGM( $id ) {
	// 	if ( \Auth::user()->c_sheaderc == $id ) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function isVIP( $id )
	// {
	// 	if ( \Auth::user()->c_sheaderc == $id ) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }





}
