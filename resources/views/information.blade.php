@extends('layouts.master')
   
<body>
@include ('layouts.nav')
<div class="container">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-11 category-main">

           <h2 class="font-italic">{{ __('messages.informationTitle') }}</h2><br>
           <h6 class="font-italic">{{ __('messages.informationSubTitle') }}</h6><br>
           	<p> 
           		{{ __('messages.uponRegistering') }} <br>
			    {{ __('messages.youWillBe') }} <br>
			    {{ __('messages.followYourFavorite') }} <br>
			    {{ __('messages.andBeAble') }} <br>

			</p>
			<br>
			<p>
				{{ __('messages.asARegistered') }}<br>
			    {{ __('messages.youCanCreate') }}<br>
			    {{ __('messages.oncePublishedThere') }}<br>
			    {{ __('messages.embed') }}<br>
			    {{ __('messages.youCanAlso') }}<br> 
			    {{ __('messages.ifCommentsAre') }}<br>
			    {{ __('messages.hideAllComments') }}<br>
			    {{ __('messages.chat') }}<br>
			</p>
			<br>
			<h6 class="font-italic">Subscribers</h6><br>
			<p>
				{{ __('messages.subscriptionbenefit') }}<br>
			</p>
             <br>

          </div><!-- /.blog-main -->
        </div><!-- /.row -->
      </main><!-- /.container -->
</body>
</html>