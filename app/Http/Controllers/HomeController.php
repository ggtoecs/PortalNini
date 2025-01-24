<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Verifica el rol del usuario y redirige según corresponda
        if (Auth::user()->role == 'empleador') {
            // Redirige al panel de vacantes si es empleador
            return redirect()->route('vacantes.index');
        } else if (Auth::user()->role == 'postulante') {
            // Redirige a la página de inicio o alguna otra página para postulantes
            return redirect()->route('vacantes.index');
        }

        // Redirige al inicio si no es ninguno de los dos
        return redirect('/');
    }
}
