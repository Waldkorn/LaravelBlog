<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        

        $locale = Session('locale');

        if ($locale != 'nl' && $locale != 'en') {
            $locale = 'en';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
