@extends ('layouts.master')

@section ('content')

<ul class="list-group">

	@foreach ($categories as $category)

		<li class="list-group-item">{{ $category->category_title }}</li>

	@endforeach

</ul>

@endsection