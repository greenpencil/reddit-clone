<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',  array('as' => 'frontpage', 'uses' =>'PageController@frontpage'));

Route::get('/r/all',  array('as' => 'all', 'uses' =>'PageController@all'));

Route::get('/u/{username}',  array('as' => 'profile', 'uses' =>'UserController@profile'));

Route::get('/login', array('as' => 'login', 'uses' =>'UserController@login'));

Route::post('/login/process', array('as' => 'handleLogin', 'uses' =>'UserController@handleLogin'));

Route::get('/logout', array('as' => 'logout', 'uses' =>'UserController@logout'));

Route::post('/login/register', array('as' => 'newuser', 'uses' =>'UserController@handleRegistration'));

Route::get('/submit', array('as' => 'submit', 'uses' =>'PostController@submit'));

Route::post('/post/new', array('as' => 'newpost', 'uses' =>'PostController@handleNewPost'));

Route::get('/create', array('as' => 'create', 'uses' =>'SubredditController@create'));

Route::get('/r/{subreddit}/{post}', array('as' => 'post', 'uses' =>'PostController@display'));

Route::get('/r/{subredditname}', array('as' => 'post', 'uses' =>'SubredditController@view'));

Route::post('/subreddit/new', array('as' => 'newsubreddit', 'uses' =>'SubredditController@handleNewSubreddit'));

Route::post('/comment/new', array('as' => 'newsubreddit', 'uses' =>'PostController@handleComments'));

Route::post('/r/{subreddit}/subscribe', array('as' => 'subscribe', 'uses' =>'SubredditController@subscribe'));

Route::post('/r/{subreddit}/unsubscribe', array('as' => 'unsubscribe', 'uses' =>'SubredditController@unsubscribe'));

