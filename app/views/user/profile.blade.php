@extends('templates.default')

@section('sidebar')
    <div class="panel panel-default">
        <div class="panel-body">
            <p><h3>{{ $user->username }}</h3></p>
            @if(Auth::check())
                @if(Auth::user()->username == $user->username)
                 <a href="/logout" class="btn btn-danger btn-block">Logout</a>
                @endif
            @endif
            <br/>
            <p>My Subreddits</p>
            <ul>
                @foreach($subreddits as $subreddit)
                    <li><a href="/r/{{ $subreddit->title }}">/r/{{ $subreddit->title }}</a></li>
                @endforeach
            </ul>
        </div>
     </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <p><h4>My Subscriptions</h4></p>
            @foreach($subscriptions as $subscription)
                <li><a href="/r/{{ $subscription->title }}">/r/{{ $subscription->title }}</a></li>
            @endforeach
        </div>
    </div>
@stop

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a href="#posts" data-toggle="tab">Posts</a></li>
        <li><a href="#comments" data-toggle="tab">Comments</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="posts">
            @foreach($posts as $post)
                <div class="row post">
                    <div class="col-md-1 vote">
                        <div class="arrow up"></div>
                        <div class="score">{{ $post->karma }}</div>
                        <div class="arrow down"></div>
                    </div>
                    <div class="col-md-1">
                        {{ HTML::image('images/default.jpg','default',array('width'=>'70','height'=>'70')) }}
                    </div>
                    <div class="col-md-10 post-title">
                        @if($post->type == "0")
                            <a href="{{ $post->url }}" class="title">{{ $post->title }}</a>
                        @else
                            <a href="/r/{{ $post->subreddit->title  }}/{{ $post->rand  }}" class="title">{{ $post->title }}</a>
                        @endif
                        <p class="tagline">submitted {{ $post->created_at->diffForHumans(); }} by <a href="/u/{{ $post->user->username  }}">{{ $post->user->username  }}</a> to <a href="/r/{{ $post->subreddit->title  }}">/r/{{ $post->subreddit->title  }}</a></p>
                        <p class="options"><a href="/r/{{ $post->subreddit->title  }}/{{ $post->rand  }}">{{ $post->comments->count() }} comments</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="tab-pane fade in" id="comments">
            @foreach($comments as $comment)
                <div class="row comment">
                    <div class="col-md-1 vote">
                        <div class="arrow up"></div>
                        <div class="arrow down"></div>
                    </div>
                    <div class="col-md-11">
                        <span class="title"><a href="{{ $post->url }}">{{ $comment->post->title }}</a> by  <a href="/u/{{ $comment->post->user->username }}">{{ $comment->post->user->username }}</a> in <a href="/r/{{ $comment->post->subreddit->title }}">/r/{{ $comment->post->subreddit->title }}</a></span>
                        <p class="tagline"><b>{{ $comment->karma }}</b> points {{ $comment->created_at->diffForHumans(); }}</p>
                        <p>{{ $comment->comment }}</p>
                        <p class="options"><a href="">Full Comments({{ $comment->post->comments->count() }})</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop