<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AplicacionController extends Controller
{
    /**
     * Postularse a una vacante.
     */
    public function store($vacante_id)
    {
        $user = Auth::user();

        // Verificar si ya se postuló a esta vacante
        $yaPostulado = Aplicacion::where('vacante_id', $vacante_id)
                                 ->where('user_id', $user->id)
                                 ->exists();

        if ($yaPostulado) {
            return redirect()->back()->with('warning', 'Ya te has postulado a esta vacante.');
        }

        Aplicacion::create([
            'vacante_id' => $vacante_id,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Te has postulado correctamente.');
    }
}
