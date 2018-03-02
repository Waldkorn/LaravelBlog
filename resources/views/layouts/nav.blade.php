<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse navbar-nav" id="navbarNavAltMarkup">
    <a class="nav-item nav-link active" href='/'>Home <span class="sr-only">(current)</span></a>
    <a class="nav-item nav-link" href="/information">{{ __('messages.information') }}</a>
    @if (Auth::check())
      <a class="nav-item nav-link" href="/posts/create">{{ __('messages.createPost') }}</a>
      <div class="nav-item nav-link active ml-auto">
        <span>
          <div class="row">
          @include('layouts.language')
          <span class="nav-item nav-link active">
            {{ __('messages.welcome') }} <a href="/profile">{{ Auth::user()->name }}</a>(<a class="nav-link d-inline" href="/logout" style="padding-left:0px; padding-right:0px;">Logout</a>)
          </span>
          </div>
        </span>
      </div>
    @else
    <span class="ml-auto">
      <div class="row">
        @include('layouts.language')
        <a class="nav-item nav-link ml-auto" href="/login">Log in</a>
        <a class="nav-item nav-link ml-auto" href="/register">{{ __('messages.register') }}</a>
      </div>
    </span>
    @endif
  </div>

</nav>

<script src="jquery/jquery.js"></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<link rel="stylesheet" href="css/bootstrap.css" />