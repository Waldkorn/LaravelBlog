@if (App::isLocale('en'))
 
	<a class="nav-item nav-link" href="/language/toggle">English</a>

@elseif (App::isLocale('nl'))
	
	<a class="nav-item nav-link" href="/language/toggle">Nederlands</a>

@endif