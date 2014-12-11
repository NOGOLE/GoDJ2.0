<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	//return all song requests associated with user
	public function songs()
	{
	return $this->hasMany('Song','dj_id');
	}
	
	//return all mood requests associated with user
	public function moods()
	{
	return $this->hasMany('Mood','dj_id');
	}
	

	public function getId()
	{
	return $this->id;
	}

}
