@if (! empty($user->blog_name))

<div class="jumbotron" style="background-image:url({{ $user->blog_header_picture }}); background-size:100%;">

  @if ($user->id == Auth::id())

    @include('profile.headerEditForm')

    @include('layouts.errors')

  @else

    <div style="background-color:white; border-radius:5px">

      <h1> {{ $user->blog_name }} </h1>

    </div>

    @if (Auth::check())

      @include( 'profile.followUnfollowForm')

    @endif

  @endif

</div>

@endif