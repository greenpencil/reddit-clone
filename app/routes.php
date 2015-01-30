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

Route::get('/u/{username}',  array('as' => 'profile', 'uses' =>'UserController@profile'));

Route::get('/login', array('as' => 'login', 'uses' =>'UserController@login'));

Route::post('/handleLogin', array('as' => 'handleLogin', 'uses' =>'UserController@handleLogin'));

Route::get('/logout', array('as' => 'logout', 'uses' =>'UserController@logout'));

Route::post('/handleRegistration', array('as' => 'create', 'uses' =>'UserController@handleRegistration'));