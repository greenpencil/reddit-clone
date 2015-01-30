<?php
class Subreddit extends Eloquent{


    protected $table = 'subreddits';
    protected $fillable = ['title','description','sidebar','created_by'];

    public function posts()
    {
        return $this->hasMany('Post','subreddit_id');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }
}
