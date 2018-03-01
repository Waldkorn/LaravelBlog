@if ($following == false)

	<a href="/profile/{{ $user->id }}/follow"><button class="btn-success">Follow</button></a>

@else

	<a href="/profile/{{ $user->id }}/unfollow"><button class="btn-danger">Unfollow</button></a>

@endif