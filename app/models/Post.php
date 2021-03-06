<?php
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Eloquent{

    use SearchableTrait;
    protected $table = 'posts';
    protected $fillable = ['title','image','url','subreddit_id','user_id','type','text'];

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

    protected $searchable = [
        'columns' => [
            'title' => 10,
        ]
    ];
}
