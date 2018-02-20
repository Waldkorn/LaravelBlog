@extends ('layouts.master')

@section ('content')

@include ('layouts.nav')

<div class="container col-md-11">
	<div class="form-group">

		<form Method="POST">

			<h1>{{ $post->title }} adsfasdfasdfasdfasdfasdfasdf</h1>

			<textarea name="body">{{ $post->body }}</textarea>

		</form>

	</div>

</div>