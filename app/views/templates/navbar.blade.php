<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Reddit</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="/">Frontpage</a></li>
                    <li {{ (Request::is('r/all') ? 'class="active"' : '') }}><a href="/r/all">All</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                    <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="/login">Register or Login</a></li>
                @else
                    <li {{ (Request::is('/u/'.Auth::user()->username) ? 'class="active"' : '') }}><a href="/u/{{Auth::user()->username}}">{{Auth::user()->username}}</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>