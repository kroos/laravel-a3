<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
class Roles extends Model
{

	protected $connection = 'sqlsrv';
	protected $table = 'Roles';
	// protected $primaryKey = 'c_id';
	// public $incrementing = false;
	// protected $keyType = 'string';
	// const CREATED_AT = 'd_cdate';
	// const UPDATED_AT = 'd_udate';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function hasoneaccount()
	{
		return $this->hasOne('App\Model\Account', 'c_sheaderb');
	}



/////////////////////////////////////////////////////////////////////////////////////////////////////

// https://laravel.com/docs/5.6/eloquent-relationships#many-to-many
	// public function belongtomanyattendees()
	// {
	// 	return $this->belongsToMany('App\Model\Fault', 'faults_attendees', 'staff_id', 'fault_id' )->withPivot('id')->withTimestamps();
	// }


/////////////////////////////////////////////////////////////////////////////////////////////////////
// belongto
	// public function belongtolabel()
	// {
	// 	return $this->belongsTo('App\Model\Label', 'active');
	// }

}
