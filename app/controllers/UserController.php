<?php

class UserController extends BaseController{

    function profile($username)
    {
        $user = User::whereUsername($username)->first();
        $posts = User::whereUsername($username)->first()->posts;
        $comments = User::whereUsername($username)->first()->comments;
        return View::make('user.profile', ['user' => $user,'posts' => $posts, 'comments' => $comments]);
    }

    function login()
    {
        return View::make('user.login');
    }
}