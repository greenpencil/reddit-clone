<?php
class Comment extends Eloquent{


    protected $table = 'comments';
    protected $fillable = ['user_id','comment','post_id','karma',];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
