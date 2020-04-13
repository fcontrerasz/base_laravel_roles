<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check())
            return redirect('login');

        if (! $request->user()->hasAnyRole(explode("|", $role))) {
            abort(401, 'No está permitida esta zona.'.$role);
        }
        return $next($request);
    }
}
