<?php


class Song extends Eloquent  {

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'songs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
	
	//return DJ associated with request
	public function dj()
	{
	return $this->belongsTo('User');
	}
}
