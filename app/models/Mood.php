<?php


class Mood extends Eloquent  {

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'moods';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	//return DJ associated with this request
	public function dj()
	{
	$this->belongsTo('User', 'dj_id');
	}
}
