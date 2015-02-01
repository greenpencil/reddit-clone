<?php


class Subscription extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscriptions';

    protected $fillable = ['subreddit_id','user_id'];

    public function subscriptions()
    {
        return $this->belongsToMany('Subscription','subscriptions','user_id','subreddit_id');
    }
}
