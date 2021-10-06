<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class SoloAdminAccess
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
        if (auth::user()->role_id == Config::get('constants.roles_id.admin')){
            return $next($request);
        }   
    }
}
