<?php
class Post extends Eloquent{


    protected $table = 'posts';
    protected $fillable = ['title','image','url','subreddit_id','user_id'];

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
