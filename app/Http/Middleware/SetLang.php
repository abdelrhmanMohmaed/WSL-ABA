<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App;
class SetLang
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
        if(!is_null($request->header('lang')))
        {
            if($request->header('lang') === 'ar' || $request->header('lang') === 'en')
            {
                App::setlocale($request->header('lang'));
            }else{
                App::setlocale('ar');
            }
        }else{
            App::setlocale('ar');
        }
        return $next($request);

    }
}
