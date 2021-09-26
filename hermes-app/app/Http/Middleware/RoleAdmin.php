<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

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
            case ('1'):
                return $next($request);
                break;
            case ('2'):
                return redirect('home-moderator');
                break;
            case ('3'):
                return redirect('home-simple-user');
                break;
        }
    }
}
