@extends('templates.default')

@section('sidebar')
    <div class="form-group">
        {{Form::text('search', null, array('placeholder' => 'Search','class'=> 'form-control'))}}
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><a href="/r/{{ $subreddit->title }}">{{ $subreddit->title }}</a></h3>
            <p><b>{{ $subreddit->description }}</b></p>
        </div>
    </div>
    @if(!Auth::check())
        <div class="panel panel-default">
            <div class="panel-body">
                {{ Form::open(array('url' => '/login/process', 'method' => 'post', 'class' => 'form-horizontal')) }}
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
    <div class="row post even">
        <div class="col-md-1">
            <div class="arrow up"></div>
            <div class="score">{{ $post->karma }}</div>
            <div class="arrow down"></div>
        </div>
        <div class="col-md-11 post-title">
            @if($post->type == "0")
                <a href="{{ $post->url }}" class="title">{{ $post->title }}</a>
            @else
                <a href="/r/{{ $post->subreddit->title  }}/{{ $post->rand  }}" class="title">{{ $post->title }}</a>
                <div class="text-post">{{$post->text}}</div>
            @endif
            <p class="tagline">submitted {{ $post->created_at->diffForHumans(); }} by <a href="/u/{{ $post->user->username  }}">{{ $post->user->username  }}</a></p>
        </div>
    </div>

    <div class="row">
        {{ Form::open(array('url' => '/comment/new', 'method' => 'post', 'class' => 'form-horizontal')) }}
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-10">
                {{Form::textarea('comment', null, array('placeholder' => 'Comment...', 'rows'=>'3', 'class'=> 'form-control'))}}
            </div>
        </div>
        {{Form::hidden('post_id', $post->id)}}
        <div class="col-lg-10 col-lg-offset-1">
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </div>
        {{ Form::close() }}
    </div>

    @foreach($comments as $comment)
        <div class="row post">
            <div class="col-md-1">
                <div class="arrow up"></div>
                <div class="arrow down"></div>
            </div>
            <div class="col-md-11">
                <p class="tagline"><a href="/u/{{ $comment->user->username }}">{{ $comment->user->username }}</a> {{ $comment->karma }} points {{ $comment->created_at->diffForHumans(); }} </p>
                <p>{{ $comment->comment }}</p>
                @if(Auth::check())
                    @if(Auth::user()->username == $comment->user->username)
                            <p class="options"><a href="/commentreply">Reply</a> <a href="/commentedit">Edit</a></p>
                    @else
                        <p class="options"><a href="/commentreply">Reply</a></p>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
@stop