<div class="blog-post">
  <h2 class="blog-post-title">
  	<a href='/posts/{{ $post->id }}'>

	  	{{ $post->title }}

    </a>
  </h2>
  <h3>

      @if ($post->category != null)
        @foreach ($post->category as $category)
          <a href="/categories/{{ $category->id }}/posts">
            <h6 class="d-inline">{{ $category->category_title }}</h6>
          </a>
        @endforeach
      @endif

  </h3>
  <p class="blog-post-meta">
    <a href='/blog/{{ $post->user->id }}'>{{ $post->user->name }}</a> on
    {{ $post->created_at->toFormattedDateString() }}
  </p>

  {!! $post->body !!}

  <hr>

</div> 