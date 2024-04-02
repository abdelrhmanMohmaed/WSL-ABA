<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class RedirectIfNotProviderOrCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::guard('provider')->check() && !Auth::guard('customer')->check())
        {
            return redirect('/');
        }
        return $next($request);
    }
}
