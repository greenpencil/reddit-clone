<?php

class SubredditController extends BaseController{
    function view($subredditname)
    {
        $subreddit = Subreddit::whereTitle($subredditname)->first();
        $posts = Subreddit::whereTitle($subredditname)->first()->posts;
        return View::make('subreddit.view',['subreddit' => $subreddit,'posts' => $posts]);
    }
}