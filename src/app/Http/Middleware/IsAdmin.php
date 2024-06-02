<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->Rol == 'administrador') {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}