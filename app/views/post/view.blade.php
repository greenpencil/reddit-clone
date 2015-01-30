@extends('templates.default')

@section('sidebar')
    <div class="form-group">
        {{Form::text('search', null, array('placeholder' => 'Search','class'=> 'form-control'))}}
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>{{ $subreddit->title }}</h3>
            <p><b>{{ $subreddit->description }}</b></p>
        </div>
    </div>
    @if(!Auth::check())
        <div class="panel panel-default">
            <div class="panel-body">
                {{ Form::open(array('url' => 'handleLogin', 'method' => 'post', 'class' => 'form-horizontal')) }}
                <fieldset>
                    <div class="form-group">
                        <div class="col-lg-12">
                            {{Form::text('username', null, array('placeholder' => 'Username', 'class'=> 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    @else
        <div class="form-group">
            <a href="/submit" class="btn btn-primary btn-block">Submit a new link</a>
        </div>
    @endif
    <p>{{ $subreddit->sidebar }}</p>
@stop

@section('content')
    <div class="row post">
        <div class="col-md-1 vote">
            <div class="arrow up"></div>
            <div class="score">{{ $post->karma }}</div>
            <div class="arrow down"></div>
        </div>
        <div class="col-md-11">
            <a href="{{ $post->url }}" class="title">{{ $post->title }}</a>
            <p class="tagline">submitted 2 hours ago by <a href="/u/{{ $post->user->username  }}">{{ $post->user->username  }}</a></p>
        </div>
    </div>

    <div class="row">
        {{ Form::open(array('url' => 'handleComments', 'method' => 'post', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-10">
                {{Form::textarea('comment', null, array('placeholder' => 'Comment...', 'rows'=>'3', 'class'=> 'form-control'))}}
            </div>
        </div>
        <div class="col-lg-10 col-lg-offset-1">
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </div>
        {{ Form::close() }}
    </div>

    @foreach($comments as $comment)
        <div class="row post">
            <div class="col-md-1 vote">
                <div class="arrow up"></div>
                <div class="arrow down"></div>
            </div>
            <div class="col-md-11">
                <p class="tagline"><a href="/u/{{ $comment->user->username }}">{{ $comment->user->username }}</a> {{ $comment->karma }} points 2 hours ago </p>
                <p>{{ $comment->comment }}</p>
            </div>
        </div>
    @endforeach
@stop