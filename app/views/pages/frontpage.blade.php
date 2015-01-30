@extends('templates.default')

@section('sidebar')
    <div class="form-group">
            {{Form::text('search', null, array('placeholder' => 'Search','class'=> 'form-control'))}}
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                    {{Form::text('username', null, array('placeholder' => 'Username', 'class'=> 'form-control'))}}
            </div>
            <div class="form-group">
                    {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
             </div>
                    <a href="#" class="btn btn-primary btn-block">Login</a>
        </div>
    </div>
    <div class="form-group">
    <a href="#" class="btn btn-primary btn-block">Submit a new link</a>
    </div>
    <div class="form-group">
    <a href="#" class="btn btn-primary btn-block">Create your own subreddit</a>
    </div>
@stop

@section('content')
    @foreach($posts as $post)
        <div class="row post">
            <div class="col-md-1 rank">
                {{ $post->id }}
            </div>
            <div class="col-md-1 vote">
                <div class="arrow up"></div>
                <div class="score">{{ $post->karma }}</div>
                <div class="arrow down"></div>
            </div>
            <div class="col-md-1">
                {{ HTML::image('images/default.jpg','default',array('width'=>'70','height'=>'70')) }}
            </div>
            <div class="col-md-9">
                <a href="{{ $post->url }}" class="title">{{ $post->title }}</a>
                <p class="tagline">submitted 2 hours ago by <a href="./u/{{ $post->user->username  }}">{{ $post->user->username  }}</a> to <a href="./r/{{ $post->subreddit->title  }}">/r/{{ $post->subreddit->title  }}</a></p>
                <p class="options"><a href="">{{ $post->comments->count() }} comments</a></p>
            </div>
        </div>
    @endforeach
@stop