<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Config;

class RoleAdmin
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
        switch (auth::user()->role_id) {
            case (Config::get('constants.roles_id.admin')):
                return $next($request);
                break;
            case (Config::get('constants.roles_id.moderator')):
                return redirect('home-moderator');
                break;
            case (Config::get('constants.roles_id.simple_user')):
                return redirect('home-simple-user');
                break;
        }
    }
}
