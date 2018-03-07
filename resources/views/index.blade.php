<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
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

             <div id="app">

              <top-users></top-users>

              <hr>

              <Categories></Categories>

              <hr>

              <archives></archives>

              <hr>

            </div>

          </div>

            <div class="col-md-8 blog-main">

              <div id="posts">

                <Posts :posts="{{ json_encode($posts) }}"></Posts>

              </div>

              @include('profile.header')

              <hr>

              @if (empty($posts)) 

                <h1> {{ __('messages.welcome') }}! </h1>

                {{ __('messages.welcomeMessage') }}

              @endif

              <script src="{{ asset('js/app.js') }}"></script>

            </div><!-- /.blog-main -->
          </div><!-- /.row -->
      </main><!-- /.container -->
    </div>
  </body>
</html>
