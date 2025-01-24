<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
{
    Log::debug('Middleware ejecutado', ['role' => $role, 'user_role' => auth()->user()->role]);

    if (auth()->check() && auth()->user()->role == $role) {
        return $next($request);
    }

    return redirect()->route('dashboard')->with('error', 'No tienes permiso para acceder a esta sección.');
}

}
