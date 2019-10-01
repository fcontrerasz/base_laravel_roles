<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Closure;

class ChequearAlta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $empresa, $redirectToRoute = null)
    {


        if (! $request->user()->hasAsigEmpresa()) {
            abort(403, 'Usuario no tiene empresa disponible.');
        }

        if(! $request->user()->hasValidEmpresa()){
            return Redirect::route('formulariodealta.index');
        }


        return $next($request);
    }
}
