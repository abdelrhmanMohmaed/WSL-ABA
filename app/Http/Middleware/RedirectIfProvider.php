<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class RedirectIfProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'provider')
    {
        if (Auth::guard($guard)->check()) {
            return redirect(url('provider/orders'));
        }

        return $next($request);
    }
}
