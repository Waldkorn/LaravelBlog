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

            <hr>

            @include( 'layouts.search' )

            <hr>

            @include( 'layouts.topUsers' )

            <hr>

            @include('categories')

            @include('layouts.errors')

            <hr>
            
            @include('layouts.archives')

            <hr>

        </div>

          <div class="col-md-8 blog-main">

            @include('profile.header')

            <hr>

            @if (!empty($posts)) 

              @foreach ($posts as $post)

               @include('layouts.posts')

              @endforeach

            @else

              <h1> {{ __('messages.welcome') }}! </h1>

              {{ __('messages.welcomeMessage') }}

            @endif



          </div><!-- /.blog-main -->
        </div><!-- /.row -->
      </main><!-- /.container -->
    </div>
  </body>
</html>
