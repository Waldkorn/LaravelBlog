@extends ('layouts.master')

@section ('content')

<ul class="list-group">

	@foreach ($categories as $category)

		<a href="/categories/{{ $category->id }}/posts">

			<li class="list-group-item">{{ $category->category_title }}</li>

		</a>
		
	@endforeach

	@if (Auth::check())
	<form method="POST" action="/categories/create">
		{{ csrf_field() }}
		<div class="form-group">
			<input name="category_title" class="form-control" placeholder="{{ __('messages.addCategory') }}">
		</div>

	</form>
	@endif

</ul>

@endsection