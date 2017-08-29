<?php

namespace Nova\Http\Middleware;

use Closure;

class ForTest
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
        dump($next);
        dump('in mid');
        return $next($request);
    }
}
