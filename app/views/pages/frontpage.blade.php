@extends('templates.default')

@section('sidebar')
    <div class="form-group">
            {{Form::text('search', null, array('placeholder' => 'Search','class'=> 'form-control'))}}
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
        <div class="form-group">
        <a href="/create" class="btn btn-primary btn-block">Create your own subreddit</a>
     @endif
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
            <div class="col-md-9 post-title">
                <a href="{{ $post->url }}" class="title">{{ $post->title }}</a>
                <p class="tagline">submitted 2 hours ago by <a href="/u/{{ $post->user->username  }}">{{ $post->user->username  }}</a> to <a href="/r/{{ $post->subreddit->title  }}">/r/{{ $post->subreddit->title  }}</a></p>
                <p class="options"><a href="/r/{{ $post->subreddit->title  }}/{{ $post->id  }}">{{ $post->comments->count() }} comments</a></p>
            </div>
        </div>
    @endforeach
@stop