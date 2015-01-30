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
                    <li {{ (Request::is('all') ? 'class="active"' : '') }}><a href="/all">All</a></li>
                <li {{ (Request::is('suggested') ? 'class="active"' : '') }}><a href="/all">Suggested</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="/login">Register or Login</a></li>
            </ul>
        </div>
    </div>
</div>