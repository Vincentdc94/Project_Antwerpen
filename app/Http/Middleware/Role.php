<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $roles)
    {
        $roles = array_except(func_get_args(), [0,1]);

        if(Auth::check())
        {
            $user = Auth::user();

            if($user->isAdmin())
            {
                return $next($request);
            }

            foreach($roles as $role)
            {
                if($user->hasRole($role))
                {
                    return $next($request);
                }
            }
        }

        return redirect('login');
    }
}
