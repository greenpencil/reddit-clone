<?php
class Post extends Eloquent{


    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function subreddit()
    {
        return $this->belongsTo('Subreddit');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }
}
