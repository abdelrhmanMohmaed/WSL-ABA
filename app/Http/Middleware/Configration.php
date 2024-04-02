<?php

namespace App\Http\Middleware;
use App\Models\Configuration;
use Closure;

class Configration
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
        $database = Configuration::first();

        #SMTP
        config(['mail.driver'       => $database->smtp_type]);
        config(['mail.host'         => $database->smtp_host]);
        config(['mail.port'         => $database->smtp_port]);
        config(['mail.from.address' => $database->smtp_sender_email]);
        config(['mail.from.name'    => $database->smtp_sender_name]);
        config(['mail.encryption'   => $database->smtp_encryption]);
        config(['mail.username'     => $database->smtp_username]);
        config(['mail.password'     => $database->smtp_password]);

        # FCM
        # config(['fcm.http.server_key' => $database->fcm_server_key]);
        # config(['fcm.http.sender_id'  => $database->fcm_sender_id]);

        return $next($request);
    }
}
