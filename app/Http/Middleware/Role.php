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

        session()->flash('message', "Je hebt geen toestemming om deze pagina te bezoeken. Log aub in met een administrator-account en probeer opnieuw.");

        if(Auth::check())
        {
            return redirect('/');
        }
        else
        {
            return redirect('login');
        }   
    }
}
