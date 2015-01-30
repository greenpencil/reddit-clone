<div class="row post">
    <div class="col-md-1 rank">
        @yield('post_rank')
    </div>
    <div class="col-md-1 vote">
        <div class="arrow up"></div>
        <div class="score">@yield('post_score')</div>
        <div class="arrow down"></div>
    </div>
    <div class="col-md-1">
        {{ HTML::image('images/default.jpg','default',array('width'=>'70','height'=>'70')) }}
    </div>
    <div class="col-md-9">
        <a href="" class="title">@yield('post_title')</a>
        <p class="tagline">submitted by @yield('post_username') to @yield('post_subreddit')</p>
        <p class="options"><a href="">@yield('comments') comments</a></p>
    </div>
</div>