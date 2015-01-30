<?php

class PostController extends BaseController{
    function submit()
    {
        return View::make('post.submit');
    }
}