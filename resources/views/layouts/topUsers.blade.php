<div>
	<h4 class="font-italic">{{ __('messages.topUsers') }}</h4>   
  	@foreach($topUsers as $topUser)
	<h6 class="mb-0">
    	<a href="/blog/{{ $topUser->id }}">
      		{{ $topUser->name }}
    	</a><br>
  	</h6>
    @endforeach
</div>