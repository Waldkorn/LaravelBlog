<div class="blog-post">
    <row>
  <h2 class="blog-post-title">

  	<a href='/posts/{{ $post->id }}'>

	  	{{ $post->title }}


  </a>
  </h2>
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
</row>
  <h3>

      @if ($post->category != null)
        {{ $post->category->category_title }}
      @endif

  </h3>
  <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

  {{ $post->body }}

</div> 