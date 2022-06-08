<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class block
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
        if (Auth::check() && auth()->user()->estado == 1) {

            // usuario con sesión iniciada pero inactivo
        
            // cerramos su sesión
            Auth::guard()->logout();
        
            // invalidamos su sesión
            $request->session()->invalidate();
        
            // redireccionamos a donde queremos
            redirect('/');
        }
        return $next($request);
    }
}
