@extends ('layouts.master')

@section ('content')

@include ('layouts.nav')

<div class="container col-md-11">

	<h1>{{ $post->title }}</h1>

	{{ $post->body }}

	  <hr>

      <div class="row">

        <a href="/posts/{{ $post->id }}/edit"><input type="button" class="btn btn-warning" value="Edit post"></a>

        @include ('comments.allowed')

      </div>

    <hr>

  <div class="comments">
	  <ul class="list-group">
	  	@foreach ($post->comments as $comment)
	  		<li class="list-group-item">
          @if (Auth::check())
            <form action='/comments/{{ $comment->id }}/delete' method="POST" class="d-inline">
              {{ method_field('POST') }}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="btn btn-danger" value="delete">    
            </form>
          @endif
              <strong>
                {{ $comment->created_at->diffForHumans() }}
              </strong>

             {{ $comment->body }}
	  		</li>

	  	@endforeach
	  </ul>
  </div>
  <hr>


  <div class="card">
  	<div class="card-block">
      @if ($post->comments_allowed == 1)
  		<form method="POST" action="/posts/{{ $post->id }}/comments">
  			{{ csrf_field() }}
  			<div class="form-group">
  				<textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-primary">Add comment</button>
  			</div>
        @include('layouts.errors')
  		</form>
      @else
      <div class="form-group">
        <div class="form-control">
          Comments not allowed for this post...
        </div>
      </div>
      @endif
  		
   	</div>
  </div>
  


</div>

@endsection