@extends('layouts.master')

@section ('content')

	@include('layouts.nav')

	<div class="container">
		<main role="main" class="container">
			<div class="col-md-11 category-main">
				<br>
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
						</table>
						@if (Auth::user()->hasRole('non_paying_user'))
							<p class="card-text">You are not subscribed (<a href="/profile/{{ Auth::user()->name }}/upgrade">subscribe</a>)</p>
						@else
							<p class="card-text">You are subscribed </p>
						@endif
					</div>
				</div>

				<div class="card bg-light mb-3">
					<div class="card-header">Blog details: </div>
					<div class="card-body">
						<table>
							<tr>
								<td style="min-width: 130px;"><p class="card-text"><b>Blog title:</b></p></td>
								<td><p class="card-text">{{ Auth::user()->blog_name }}</p></td>
							</tr>
							<tr>
								<td><p class="card-text"><b># of blogposts:</b></p></td>
								<td><p class="card-text">{{ $user->posts_count }}</p></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="card bg-light mb-3">
					<div class="card-header">Header settings: </div>
					<div class="card-body">

						 <div class="jumbotron" style="background-image:url({{ $user->blog_header_picture }}); background-size:100%;">

						 	    <div style="background-color:white; border-radius:5px">

							    	<h1> {{ $user->blog_name }} </h1>

							    </div>

						 </div>

						 @include('profile.headerEditForm')

					</div>
				</div>

			</div><!-- /.blog-main -->
		</main><!-- /.container -->
	</div>

@endsection