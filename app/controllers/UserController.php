<?php

class UserController extends BaseController{

    function profile($username)
    {
        $user = User::whereUsername($username)->first();
        $posts = User::whereUsername($username)->first()->posts;
        $comments = User::whereUsername($username)->first()->comments;
        $subreddits = User::whereUsername($username)->first()->subreddits;
        return View::make('user.profile', ['user' => $user,'posts' => $posts, 'comments' => $comments, 'subreddits'=>$subreddits]);
    }

    function login()
    {
        return View::make('user.login');
    }

    public function handleLogin()
    {
        $data = Input::only(['username', 'password']);

        $validator = Validator::make(
            $data,
            [
                'username' => 'required|min:3',
                'password' => 'required',
            ]
        );
        if($validator->fails()){
            return Redirect::route('login')->with('message', $validator);
        }

        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']])){
            return Redirect::route('frontpage');
        }
        return Redirect::route('login')->with('message', 'Wrong Username or Password');
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::route('frontpage');
    }

    public function handleRegistration()
    {
        $data = Input::only(['username','password','password_confirmation','email']);

        $validator = Validator::make(
            $data,
            [
                'username' => 'required|min:3',
                'email' => 'required|email|min:5',
                'password' => 'required|min:5|confirmed',
                'password_confirmation'=> 'required|min:5'
            ]
        );
        if($validator->fails()){
            return Redirect::route('register')->withErrors($validator)->withInput();
        }

        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::route('frontpage');
        }

        return Redirect::route('register')->with('message', 'Please try again');
    }
}