@extends ('layouts.master')

@section ('content')

@include ('layouts.nav')

<div class="container col-md-11">

  <div class="row">

	<h1>{{ $post->title }}</h1>

  @if ($post->user->id == Auth::id())

    <a href="/posts/{{ $post->id }}/edit" class="ml-auto"><input type="button" class="btn btn-warning" value="Edit post"></a>

  @endif

  </div>

  <h3>

    @if ($post->category != null)
      {{ $post->category->category_title }}
    @endif

  </h3>

	{!! $post->body !!}

	  <hr>

      <div class="row">



      </div>

    <hr>

  <div class="comments">
	  <ul class="list-group">
	  	@foreach ($post->comments as $comment)
	  		<li class="list-group-item">
          <div class="row">
            <div>
            <strong>
              {{ $comment->created_at->diffForHumans() }}
            </strong>

            {{ $comment->user->name }}:

            {{ $comment->body }}

            </div>
              <div class="ml-auto">

          
          @if ($comment->user->id == Auth::id() || $post->user->id == Auth::id())
              <form action='/comments/{{ $comment->id }}/delete' method="POST" class="d-block">
                {{ method_field('POST') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="delete">    
              </form>
          @endif
        </div>
        </div>


	  		</li>

	  	@endforeach
	  </ul>
  </div>
  <hr>


  <div class="card">
  	<div class="card-block">

      @if (Auth::check())
        @if ($post->comments_allowed == 1)
    		<form method="POST" action="/posts/{{ $post->id }}/comments">
    			{{ csrf_field() }}
    			<div class="form-group">
    				<textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
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

        @else 
        <div class= "form-group">
          <div class="form-control">
            Please sign in to comment...
          </div>
        </div>

  		@endif
   	</div>
  </div>
  


</div>

@endsection