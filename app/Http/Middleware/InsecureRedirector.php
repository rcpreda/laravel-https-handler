<?php

namespace App\Http\Middleware;

use Closure;

class InsecureRedirector
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
        if($request->isSecure()) {
            \Redirect::to($request->getRequestUri(), 302, [], false)->send();
        }

        return $next($request);
    }
}
