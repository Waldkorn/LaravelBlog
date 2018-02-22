@if (Auth::check()) 
 @if ($post->comments_shown == 1)
 	<form action='/comments/{{ $post->id }}/showComments' method="POST">
          
    	{{ csrf_field() }}
 
    	<input type="submit" class="btn btn-success" value="show comments">
  	</form>
  @else
    <form action='/comments/{{ $post->id }}/showComments' method="POST">
              
      {{ csrf_field() }}

      <input type="submit" class="btn btn-danger" value="hide comments">
    </form>
  @endif
@endif