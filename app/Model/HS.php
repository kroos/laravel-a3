<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
class HS extends Model
{

	protected $connection = 'sqlsrv';
	protected $table = 'HS';
	// protected $primaryKey = 'HSID';
	// public $incrementing = false;
	// protected $keyType = 'string';
	// const CREATED_AT = 'CreateDate';
	// const UPDATED_AT = 'SaveDate';
	protected $primaryKey = null;
	public $incrementing = false;
	// public $timestamps = false;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// public function hasoneaccount()
	// {
	// 	return $this->hasOne('App\Model\Account', 'c_sheaderb');
	// }



/////////////////////////////////////////////////////////////////////////////////////////////////////

// https://laravel.com/docs/5.6/eloquent-relationships#many-to-many
	// public function belongtomanyattendees()
	// {
	// 	return $this->belongsToMany('App\Model\Fault', 'faults_attendees', 'staff_id', 'fault_id' )->withPivot('id')->withTimestamps();
	// }


/////////////////////////////////////////////////////////////////////////////////////////////////////
// belongto
	public function belongstohstable()
	{
		return $this->belongsTo('App\Model\HS', 'HSID');
	}

}
