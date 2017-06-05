<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>                
                <span class="icon-bar"></span>                
                <span class="icon-bar"></span>                
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu">
        <ul class="nav-menu nav navbar-nav">
            <li>
                <a href="{{ asset("/") }}">
                <span class="glyphicon glyphicon-home"></span> {{ trans('Home') }}</a>
            </li>
        </ul>
        </div>
    </div>
</nav>