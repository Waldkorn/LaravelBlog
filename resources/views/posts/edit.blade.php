@extends ('layouts.master')

@section ('content')

@include ('layouts.nav')

<div class="container col-md-11">
	

		<form Method="POST" action="update">

			{{ csrf_field() }}

			<div class="form-group">

				<label for="title">Title:</label>
				<input name="title" class="form-control" value="{{ $post->title }}">

			</div>

			<hr>

			<div class="form-group">

				<textarea name="body" class="form-control">{{ $post->body }}</textarea>

			</div>

			<button type="submit" class="btn btn-primary">Submit changes</button>

		</form>

	</div>

</div>