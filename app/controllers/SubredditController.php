<?php

class SubredditController extends BaseController{
    function view($subredditname)
    {
        $subreddit = Subreddit::whereTitle($subredditname)->first();
        $posts = $subreddit->posts;
        $subscribers = $subreddit->subscribers;
        $subscribed = false;
        foreach($subscribers as $subscriber)
        {
            if($subscriber->username == Auth::user()->username)
            {
                $subscribed = true;
                break;
            }
        }
        return View::make('subreddit.view',['subreddit' => $subreddit,'posts' => $posts, 'subscribers' => $subscribers , 'subscribed' => $subscribed]);
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

    function subscribe($subreddit)
    {
        $user = User::whereUsername(Auth::user()->username)->first();
        $sredit = Subreddit::whereTitle($subreddit)->first();
        $user->subscriptions()->sync([$sredit->id],false);

        return Redirect::to('/r/'.$subreddit);
    }

    function unsubscribe($subreddit)
    {
        $user = User::whereUsername(Auth::user()->username)->first();
        $sredit = Subreddit::whereTitle($subreddit)->first();
        $user->subscriptions()->detach([$sredit->id]);

        return Redirect::to('/r/'.$subreddit);
    }
}