<?php

namespace App\Http\Middleware;

use Closure;

class Apitoken
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
        $token = $request->header('APP_KEY');
        if($token != '123456') return response()->json(['mensaje' => 'Token no encontrada'], 401);
        return $next($request);
    }
}
