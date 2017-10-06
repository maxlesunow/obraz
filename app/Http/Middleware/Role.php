<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $guard = null)
    {
        if (!Auth::check() || $role !== Auth::user()->role->name) 
        {
            return redirect('/register');
        }
    
        return $next($request);
    }
}
