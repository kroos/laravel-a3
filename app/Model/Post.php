<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
class Post extends Model
{

	protected $connection = 'sqlsrv';
	protected $table = 'Post';
	// protected $primaryKey = 'c_id';
	// public $incrementing = false;
	// protected $keyType = 'string';
	// const CREATED_AT = 'd_cdate';
	// const UPDATED_AT = 'd_udate';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function hasmanycomment()
	{
		return $this->hasMany('App\Model\PostComment', 'post_id');
	}



/////////////////////////////////////////////////////////////////////////////////////////////////////

// https://laravel.com/docs/5.6/eloquent-relationships#many-to-many
	// public function belongtomanyattendees()
	// {
	// 	return $this->belongsToMany('App\Model\Fault', 'faults_attendees', 'staff_id', 'fault_id' )->withPivot('id')->withTimestamps();
	// }


/////////////////////////////////////////////////////////////////////////////////////////////////////
// belongto
	public function belongstoaccount()
	{
		return $this->belongsTo('App\Model\Account', 'author');
	}

	public function belongstopostcategory()
	{
		return $this->belongsTo('App\Model\PostCategory', 'category_id');
	}

}
