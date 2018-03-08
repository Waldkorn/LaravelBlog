<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="collapse navbar-collapse navbar-nav" id="navbarNavAltMarkup">
      <li class="nav-item active">
        <a class="nav-link" href='/'>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="padding-left:20px;" href="/information">{{ __('messages.information') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="padding-left:20px;" href="/chat">Chat</a>
      </li>
      <li class="nav-item">
        @include('layouts.language')
      </li>
      @if (Auth::check())

      <li class="nav-item">
        <a class="nav-link" href="/posts/create">{{ __('messages.createPost') }}</a>
      </li>

    @endif
  </ul>
    @if (Auth::check())
    <ul class="nav navbar-nav flex-grow justify-content-end" style="padding-left:100px;">

        <div class="row">

        <li class="nav-item active" >
          {{ __('messages.welcome') }} <a href="/profile">{{ Auth::user()->name }}</a>
        </li>
        <li class="nav-item">
          (<a class="nav-link d-inline" href="/logout" style="padding-left:0px; padding-right:0px;">Logout</a>)
        </li>
        </div>
    </ul>
    @else
    <ul class="nav navbar-nav flex-grow justify-content-end" style="padding-left:150px;">
     <li class="nav-item active">
        <a class="nav-item nav-link" href="/login">Log in</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href="/register">{{ __('messages.register') }}</a>
      </li>
    </ul>
    @endif

   </div>
</nav>
