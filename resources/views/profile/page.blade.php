@extends('layouts.master')

@section ('content')

	@include('layouts.nav')

	<div class="container">
		<main role="main" class="container">
			<div class="col-md-11 category-main">

				<div class="card bg-light mb-3">
					<div class="card-header">Profile details: </div>
					<div class="card-body">
						<table>
							<tr>
								<td style="min-width: 130px;"><p class="card-text"><b>Username:</b></p></td> 
								<td><p class="card-text">{{ $user->name }}</p></td>
							</tr>
							<tr>
								<td><p class="card-text"><b>Email:</b></p></td>
								<td><p class="card-text">{{ $user->email }}</p></td>
							</tr>
							<tr>
								<td><p class="card-text"><b># of posts</b></p></td>
								<td><p class="card-text">{{ $user->posts_count }}</p></td>
							</tr>
						</table>
						@if (Auth::user()->hasRole('non_paying_user'))
							<p class="card-text">You are not subscribed (<a href="/profile/{{ Auth::user()->name }}/upgrade">subscribe</a>)</p>
						@else
							<p class="card-text">You are subscribed </p>
						@endif
					</div>
				</div>

			</div><!-- /.blog-main -->
		</main><!-- /.container -->
	</div>

@endsection