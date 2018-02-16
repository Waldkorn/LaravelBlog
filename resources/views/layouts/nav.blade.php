<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href='/'>Home <span class="sr-only">(current)</span></a>
      @if (Auth::check())
      <a class="nav-item nav-link" href="/posts/create">Create Post</a>
      @endif
      @if (Auth::check()) 
      <a class="nav-item nav-link" href="/logout">Logout</a>
      @else
      <a class="nav-item nav-link" href="/login">Login</a>
      @endif
    </div>
  </div>
</nav>
