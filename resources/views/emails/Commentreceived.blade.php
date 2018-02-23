@component('mail::message')
You received a comment on the following post: {{ $post->title }}

@component('mail::button', [ 'url' => 'http://laravelblog.test/posts/' . $post->id ])
Click here to view the post
@endcomponent

@endcomponent