@extends ('layouts.master')

@section ('content')

<ul class="list-group">

	@foreach ($categories as $category)

		<a href="/categories/{{ $category->id }}/posts">

			<li class="list-group-item">{{ $category->category_title }}</li>

		</a>
		
	@endforeach

	<form method="POST" action="/categories/create">
		{{ csrf_field() }}
		<div class="form-group">
			<!--<li class="list-group-item"> -->
				<input name="category_title" class="form-control" placeholder="add category...">
			<!--</li>-->
		</div>

	</form>

</ul>

@endsection