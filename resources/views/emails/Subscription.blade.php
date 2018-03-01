@component('mail::message')
	Hello {{ $user->name }}. Your Subscription is about to end.

@component('mail::button', [ 'url' => 'http://shrouded-fortress-34370.herokuapp.com/login'  ])
Log in to resubscribe
@endcomponent

@endcomponent