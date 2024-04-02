<?php

namespace App\Http\Middleware;
use App\Models\Customer;
use Closure;
use Session;

class CustomerAuth
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
            if(count( $token) == 2)
            {

                $customer = Customer::where('api_token',$token[1])->first();
                if($customer)
                {
                    Session::flash('customer',$customer);
                
                    return $next($request);
                }else{
                    return response()->json(["error" => "Unauthenticated."],401);
                }
            }else{
                return response()->json(["error" => "Unauthenticated."],401);

            }
        }else{
            return response()->json(["error" => "Unauthenticated."],401);
        }
    }

}
