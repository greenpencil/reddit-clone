<?php

class PostController extends BaseController{
    function submit()
    {
        $subreddits = Subreddit::All()->random(5);
        return View::make('post.submit',['subreddits' => $subreddits]);
    }

    function handleNewPost()
    {
        if(Input::get('type') == '0') {
            $subreddit = Input::get('subreddit');
            $data = Input::only(['title', 'url','type']);
            $validator = Validator::make(
                $data,
                [
                    'title' => 'required|min:3',
                    'url' => 'required|max:30',
                ]
            );
        }
        else{
            $subreddit = Input::get('subreddit1');
            $data = Input::only(['title','text','type']);
            $validator = Validator::make(
                $data,
                [
                    'title' => 'required|min:3',
                    'text' => 'required|min:3',
                ]
            );
        }
        $data['subreddit_id'] = Subreddit::whereTitle($subreddit)->first()->id;
        $data['user_id'] = Auth::user()->id;
        $data['image'] = 'default';
        $data['rand'] = str_random(5);
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
        $post = Post::whereRand($post)->first();
        $subreddit = Subreddit::whereTitle($subreddit)->first();
        $comments = $post->comments;
        return View::make('post.view',['post' => $post,'subreddit' => $subreddit,'comments' => $comments]);
    }

    function handleComments()
    {
        $post_id = Input::get('post_id');
        $subreddit = Post::whereid($post_id)->first()->subreddit;
        $data = Input::only(['comment','post_id']);
        $data['user_id'] = Auth::user()->id;
        $validator = Validator::make(
            $data,
            [
                'comment' => 'required|min:3',
            ]
        );
        if($validator->fails()){
            return Redirect::to('/r/'.$subreddit->title.'/'.$post_id)->withErrors($validator)->withInput();
        }
        $newComment = Comment::create($data);
        if($newComment){
            return Redirect::to('/r/'.$subreddit->title.'/'.$post_id);
        }
    }
}