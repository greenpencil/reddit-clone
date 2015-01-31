<?php

class PostController extends BaseController{
    function submit()
    {
        $subreddits = Subreddit::All()->random(5);
        return View::make('post.submit',['subreddits' => $subreddits]);
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