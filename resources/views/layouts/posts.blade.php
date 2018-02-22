<div class="blog-post">
    <row>
  <h2 class="blog-post-title">

  	<a href='/posts/{{ $post->id }}'>

	  	{{ $post->title }}

  </a>
  </h2>
</row>
  <h3>

      @if ($post->category != null)
        @foreach ($post->category as $category)
          <a href="/categories/{{ $category->id }}/posts">
            <span class="border">{{ $category->category_title }}</span>
          </a>
        @endforeach
      @endif

  </h3>
  <p class="blog-post-meta">
    <a href='/posts/blog/{{ $post->user->id }}'>{{ $post->user->name }}</a> on
    {{ $post->created_at->toFormattedDateString() }}
  </p>

  {!! $post->body !!}

  <hr>

</div> 