@if (Auth::check()) 
 @if ($post->comments_allowed == 1)
 	<form action='/comments/{{ $post->id }}/toggle' method="POST">
          
    	{{ csrf_field() }}
 
    	<input type="submit" class="btn btn-success" value="{{ __('messages.commentsAllowed') }}">
  	</form>
  @else
    <form action='/comments/{{ $post->id }}/toggle' method="POST">
              
      {{ csrf_field() }}

      <input type="submit" class="btn btn-danger" value="{{ __('messages.commentsNotAllowed') }}">
    </form>
  @endif
@endif