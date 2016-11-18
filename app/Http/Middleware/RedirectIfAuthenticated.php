<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (auth()->user()->role_id == 1)
                return "admin"; // todo:redirect to manager index
            if (auth()->user()->role_id == 2)
                return "teacher"; // todo:redirect to teacher index
            if (auth()->user()->role_id == 3)
                return "parent"; // todo:redirect to parent index
            if (auth()->user()->role_id == 4)
                return "student"; // todo:redirect to student index


           // return route('Index'); //todo:: remove this
        }

        return $next($request);
    }
}
