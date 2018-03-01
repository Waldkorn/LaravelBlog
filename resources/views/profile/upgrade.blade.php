@extends('layouts.master')

@section ('content')

	@include('layouts.nav')

	<div class="container">
		<main role="main" class="container">
			<div class="col-md-11 category-main">

				@if (Auth::user()->hasRole('non_paying_user'))

					<h1>Welcome, {{ $user->name }} </h1>

					<h3>Would you like to upgrade your account?</h3>

					<hr>

					<form method="POST" action="/profile/{{ $user->name }}/setUpgrade">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>

						<div class="form-group">
							<label for="payment details">IBAN</label>
							<input type="text" class="form-control" id="iban" name="iban">
						</div>

						<div class="form-group">
							<label for="payment details">BIC</label>
							<input type="text" class="form-control" id="bic" name="bic">
						</div>

						<button type="submit" class="btn btn-primary">Subscribe</button>

					</form>

					@include('layouts.errors')

				@else

					<h1>Hey! You already paid for your account.</h1>

					<h3>Move along sir...</h3>

				@endif

			</div><!-- /.blog-main -->
		</main><!-- /.container -->
	</div>

@endsection
