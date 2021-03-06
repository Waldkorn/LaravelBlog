@extends ('layouts.master')

@section ('content')

@include ('layouts.nav')

<div class="container col-md-11">

	<hr>

	<div class="row">

		@include ('comments.allowed')

		@include ('comments.showcomments')
		
		<form action='/posts/{{ $post->id }}/delete' method="POST">
      
	    	{{ csrf_field() }}
	 
	    	<input type="submit" class="btn btn-danger" value="delete post">

	  	</form>

	</div>

	<hr>	

	<form Method="POST" action="update">

		{{ csrf_field() }}

		<div class="form-group">

			<label for="title">{{ __('messages.title') }}</label>
			<input name="title" class="form-control" value="{{ $post->title }}">

		</div>

		<div class="form-group">
  
		  	<label for="category">{{ __('messages.category') }}</label>
		  	<select type="integer" class="form-control" id="category_id" name="category_id">
		  		@foreach ($categories as $category)
		  			<option value={{ $category->id }}>{{ $category->category_title }}</option>
		  		@endforeach
		  	</select>

		</div>

		<div class="form-group">

			<textarea name="body" class="form-control">{{ $post->body }}</textarea>

		</div>

		<button type="submit" class="btn btn-primary">{{ __('messages.submitChanges') }}</button>
		
	</form>

	<hr>

</div>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="{{ asset('js/text_expander.js') }}"></script>