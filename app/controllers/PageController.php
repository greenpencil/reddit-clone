<?php

class PageController extends BaseController{

    function frontpage()
    {
        $posts = Post::all();
        return View::make('pages.frontpage', ['posts' => $posts]);
    }

}