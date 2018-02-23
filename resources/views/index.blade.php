<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>
    @include ('layouts.nav')
    
    <div class="container">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-3 category-main">

            @include( 'layouts.search' )

            <hr>

            @include( 'layouts.topusers' )

            <hr>

            @include('categories')

            <hr>
            
            @include('layouts.archives')

            <hr>
          



        </div>

          <div class="col-md-8 blog-main">

            @if (! empty($user->blog_name))

            <div class="jumbotron" style="background-image:url({{ $user->blog_header_picture }}); background-size:100%;">

              @if ($user->id == Auth::id())

                  <form method="POST" action="/posts/blog/{{ $user->id }}/blogEdit">
                    {{ csrf_field() }}
                    
                      <div class="form-group">
                        <div class="container">
                          <div class="row">
                            <input class="form-control" name="blogpicture" value="{{ $user->blog_header_picture }}" placeholder="type an url..." required>
                            <input class="form-control" name="blogname" value="{{ $user->blog_name }}" placeholder="type a blogname..." required>
                            <input type="submit" class="btn btn-warning ml-auto" value="Edit Blog">
                          </div>
                        </div>
                      </div>
                  </form>

                @include('layouts.errors')

              @else

                <div style="background-color:white; border-radius:5px">

                  <h1> {{ $user->blog_name }} </h1>

                </div>

                @if (Auth::check())

                  @if ($following == false)

                  <a href="/profile/{{ $user->id }}/follow">Follow User</a>

                  @else

                  <a href="/{{ $user->id }}/unfollow">Unfollow User</a>

                  @endif
                @endif

              @endif


            </div>

            @endif

            @foreach ($posts as $post)

             @include('layouts.posts')

            @endforeach

          </div><!-- /.blog-main -->
        </div><!-- /.row -->
      </main><!-- /.container -->
    </div>
  </body>
</html>
