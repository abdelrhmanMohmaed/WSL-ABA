<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App;
use Session;
use App\Models\User;

class UserAuth
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
        if(!is_null($request->header('Authorization')))
        {
            $token = $request->header('Authorization');
            $token = explode(' ',$token);

            if(count( $token) !== 2 )
            {
                return response()->json(["error" => "Unauthenticated."],401);
            }

            $user = user::where('api_token',$token[1])->first();
            if($user)
            {
                Session::flash('user',$user);
                if(!is_null($request->header('lang')))
                {
                    $user->lang = $request->header('lang');
                    $user->save();
                }
                return $next($request);
            }else{
                return response()->json(["error" => "Unauthenticated."],401);
            }
        }else{
            return response()->json(["error" => "Unauthenticated."],401);
        }
    }
}
