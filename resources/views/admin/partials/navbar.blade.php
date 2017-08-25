<ul class="nav navbar-nav">
  <li><a href="/">Blog Home</a></li>
  @if (Auth::check())
    <li @if (Request::is('admin/post*')) class="active" @endif>
      <a href="/admin/post">Posts</a>
    </li>
    <li @if (Request::is('admin/tag*')) class="active" @endif>
      <a href="/admin/tag">Tags</a>
    </li>
    <li @if (Request::is('admin/message*')) class="active" @endif>
      <a href="/admin/message">Message</a>
    </li>
    <li @if (Request::is('admin/comment*')) class="active" @endif>
      <a href="/admin/comment">Comment</a>
    </li>
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ url('/profile') }}">Profile</a></li>
        <li><a href="{{ url('/logout') }}">Sign out</a></li>
      </ul>
    </li>
  @endif
</ul>