@extends('layouts.master')

@section ('content')

	<h1>Publish a Post</h1>

	<hr>

	<form method="POST" action="/posts">

		{{ csrf_field() }}
		
	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>
	  <div class="form-group">
	  	<!--
	  	<label for="category">Category</label>
	  	<select type="integer" class="form-control" id="category_id" name="category_id">
	  		@foreach ($categories as $category)
	  			<option value={{ $category->id }}>{{ $category->category_title }}</option>
	  		@endforeach
	  	</select>
	  -->
	  <label for="category_id">Category</label>
	  <input type="integer" class="form-control" id="category_id" name="category_id">
	  </div>
	  <div class="form-group">
	    <label for="Body">Body</label>
	   <textarea id="body" name="body" class="form-control" ></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Publish</button>

	  @include ('layouts.errors')
	</form>


@endsection