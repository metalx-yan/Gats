<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $role2 = null)
    {
        if (!is_null($role2)) {
            if ($request->user()->hasRole($role) or $request->user()->hasRole($role2)) {
                return $next($request);
            }   else {
                return back();
            }
        } else {
            if ($request->user()->hasRole($role)) {
                return $next($request);
            }   else {
                return back();
            }
        }
    }
}
