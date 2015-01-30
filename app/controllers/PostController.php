<?php

class PostController extends BaseController{
    function submit()
    {
        return View::make('post.submit');
    }

    function handleNewPost()
    {
        $subreddit = Input::get('subreddit');
        $data = Input::only(['title','url']);
        $data['subreddit_id'] = Subreddit::whereTitle($subreddit)->first()->id;
        $data['user_id'] = Auth::user()->id;
        $data['image'] = 'default';
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:3',
                'url' => 'required|min:3',
            ]
        );
        if($validator->fails()){
            return Redirect::route('submit')->withErrors($validator)->withInput();
        }
        $newPost = Post::create($data);
        if($newPost){
            return Redirect::to('/r/'.$subreddit.'/'.$newPost->id);
        }
    }

    function display($subreddit,$post)
    {
        $post = Post::whereid($post)->first();
        $subreddit = Subreddit::whereTitle($subreddit)->first();
        return View::make('post.view',['post' => $post,'subreddit' => $subreddit]);
    }
}