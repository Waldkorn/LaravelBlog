@extends ('layouts.master')

@section ('content')

<ul class="list-group">

	@foreach ($categories as $category)

		<a href="/categories/{{ $category->id }}/posts">

			<li class="list-group-item">{{ $category->category_title }}</li>

		</a>
		
	@endforeach

</ul>

@endsection