<?php

class PageController extends BaseController{

    function frontpage()
    {
        if(Auth::check()) {
            $subscriptions = User::whereUsername(Auth::user()->username)->first()->subscriptions;
            $posts = null;
            foreach ($subscriptions as $subscription) {
                $posts = Post::whereSubreddit($subscription->title);
            }
        }
        $posts = Post::all();
        return View::make('pages.frontpage', ['posts' => $posts]);
    }


    function all()
    {
        $posts = Post::all();
        return View::make('pages.frontpage', ['posts' => $posts]);
    }

    function search($terms)
    {
        $posts = Post::all();
        return View::make('pages.frontpage', ['posts' => $posts]);
    }

}