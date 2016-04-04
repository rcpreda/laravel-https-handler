<?php

namespace App\Http\Middleware;

use Closure;

class SecureRedirector
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
        if(!$request->isSecure()) {
            \Redirect::secure($request->getRequestUri())->send();
        }

        return $next($request);
    }
}
