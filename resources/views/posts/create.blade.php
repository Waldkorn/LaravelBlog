@extends('layouts.master')

@section ('content')

@if (Auth::check())

	@include ('layouts.nav')

	<div class="container col-md-11">
	
	<h1>Publish a Post</h1>

</div>

	<hr>

	<div class="container col-md-11">

	<form method="POST" action="/posts">

		{{ csrf_field() }}
		
	  <div class="form-group">
	    <label for="title">{{ __('messages.title') }}</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>
	  <div class="form-group">
	  
	  	<label for="category">{{ __('messages.category') }}</label>
	  	<select type="array" class="form-control" id="category_id[]" name="category_id[]" multiple>
	  		@foreach ($categories as $category)
	  			<option value="{{ $category->id }}">{{ $category->category_title }}</option>
	  		@endforeach
	  	</select>
	  	
	  <div class="form-group">
	    <label for="Body">{{ __('messages.body') }}</label>
	   <textarea id="body" name="body" class="form-control" ></textarea>
	  </div>

	  	@if (Auth::user()->hasRole('paying_user') || Auth::user()->posts_count < 5)
	   
	  		<button type="submit" class="btn btn-primary">Publish</button>

		  	@if (Auth::user()->hasRole('non_paying_user'))

				<div class="card text-white bg-warning mb-3" style="max-width: 50%;">
				  <div class="card-body">
				    <p class="card-text">{{ __('messages.postsLeft') }}{{ 5 - Auth::user()->posts_count }}{{ __('messages.postsLeftTwo') }}</p>
				  </div>
				</div>

			@endif

		@else

			<div class="card text-white bg-danger mb-3" style="max-width: 50%;">
			    <div class="card-body">
			    	<p class="card-text">{{ __('messages.please') }} <a href="/profile/{{ Auth::user()->name }}/upgrade"> {{ __('messages.upgrade') }}</a> {{ __('messages.toPost') }}</p>
			    </div>
			</div>

	  	@endif



	  

	  @include ('layouts.errors')
	</form>

</div>

@else

<h1>HEY!</h1>

You're not supposed to be here! Please <a href="/login">login</a>

@endif

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="{{ asset('js/text_expander.js') }}"></script>

@endsection