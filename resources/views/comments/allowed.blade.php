  @if (Auth::check()) 
   <form action='/comments/{{ $post->id }}/toggle' method="POST">
            
    {{ csrf_field() }}
    @if ($post->comments_allowed == 1)
    <input type="submit" class="btn btn-success" value="comments allowed">
    </form>
    @else
     <form action='/comments/{{ $post->id }}/toggle' method="POST">
                
      {{ csrf_field() }}

        <input type="submit" class="btn btn-danger" value="comments not allowed">
     </form>
     @endif
   @endif