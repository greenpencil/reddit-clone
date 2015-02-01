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
	protected $fillable = ['username','password','email'];
	protected $hidden = array('password', 'remember_token');

	public function subreddits()
	{
		return $this->hasMany('Subreddit', 'created_by');
	}

	public function posts()
	{
		return $this->hasMany('Post', 'user_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment', 'user_id');
	}

	public function subscriptions()
	{
		return $this->belongsToMany('Subreddit','subscriptions');
	}
}
