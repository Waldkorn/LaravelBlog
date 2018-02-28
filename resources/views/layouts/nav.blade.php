<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse navbar-nav" id="navbarNavAltMarkup">
      <a class="nav-item nav-link active" href='/'>Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/information">Information</a>
      @if (Auth::check())
        <a class="nav-item nav-link" href="/posts/create">Create Post</a>
        <div class="nav-item nav-link active ml-auto">
          <span>
            Welcome <a href="/profile">{{ Auth::user()->name }}</a>(<a class="nav-link d-inline" href="/logout" style="padding-left:0px; padding-right:0px;">Logout</a>)
          </span>
        </div>
      @else
      <span class="ml-auto">
        <div class="row">
          <a class="nav-item nav-link ml-auto" href="/login">Login</a>
          <a class="nav-item nav-link ml-auto" href="/register">Register</a>
        </div>
      </span>
      @endif
  </div>
</nav>