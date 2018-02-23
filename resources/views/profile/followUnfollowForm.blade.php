@if ($following == false)

	<a href="/profile/{{ $user->id }}/follow">Follow User</a>

@else

	<a href="/{{ $user->id }}/unfollow">Unfollow User</a>

@endif