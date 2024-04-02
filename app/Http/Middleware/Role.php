<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;

use Closure;
use App\Models\Permission;
use Auth;
class Role
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

        $permissions = Permission::where('role_id',Auth::user()->role)->pluck('permission')->toArray();

        if (in_array(Route::currentRouteName(), $permissions) != false)
        {
            return $next($request);
        }else
        {
            abort('550');
        }
    }
}
