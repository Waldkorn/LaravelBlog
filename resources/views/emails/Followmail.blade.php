@component('mail::message')
	You are subscribed to {{ $user->name }}.
 {{ $user->name }} created a new post.

@component('mail::button', [ 'url' => 'http://laravelblog.test/posts/' . $post->id ])
Click here to view the post
@endcomponent

@endcomponent