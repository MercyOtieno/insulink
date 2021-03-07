<?php

namespace Botble\ACL\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards) {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->isSuperUser(); 
                switch ($role) {
                    case '1':
                        return redirect(route('dashboard.index'));
                        break;

                    default:
                        return redirect(route('customer.dashboard')); 
                        break;
                }
            }
        }
        return $next($request);
    }
}
