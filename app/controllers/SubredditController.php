<?php

class SubredditController extends BaseController{
    function view($subredditname)
    {
        $subreddit = Subreddit::whereTitle($subredditname)->first();
        $posts = Subreddit::whereTitle($subredditname)->first()->posts;
        return View::make('subreddit.view',['subreddit' => $subreddit,'posts' => $posts]);
    }

    function create()
    {
        return View::make('subreddit.create');
    }

    function handleNewSubreddit()
    {
        $data = Input::only(['title','description','sidebar']);
        $data['created_by'] = Auth::user()->id;
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:3',
                'description' => 'required|max:500',
                'sidebar' => 'required|max:1500'
            ]
        );
        if($validator->fails()){
            return Redirect::route('create')->withErrors($validator)->withInput();
        }
        $newSubreddit = Subreddit::create($data);
        if($newSubreddit){
            return Redirect::to('/r/'.$data['title']);
        }
    }
}