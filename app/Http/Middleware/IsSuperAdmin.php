<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperAdmin
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
        if (auth()->check() and auth()->user()->role_id == 1) {
            return $next($request);
        }
        else {
            return redirect()->back()->with('error', 'You have no permission to access');
        }
    }
}
