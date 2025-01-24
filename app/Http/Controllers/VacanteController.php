<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    // Método para mostrar la vista de edición
    public function edit($id)
    {
        $vacante = Vacante::findOrFail($id);
        return view('vacantes.edit', compact('vacante'));
    }

    public function dashboard()
    {
        // Obtener todas las vacantes
        $vacantes = Vacante::all();

        // Pasar las vacantes a la vista
        return view('dashboard', compact('vacantes'));
    }

    // Método para actualizar la vacante
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
            'ubicacion' => 'required',
            'tipo_trabajo' => 'required',
        ]);

        $vacante = Vacante::findOrFail($id);
        $vacante->update($request->all());

        return redirect()->route('vacantes.index')->with('success', 'Vacante actualizada con éxito');
    }

    // Método para eliminar la vacante
    public function destroy($id)
    {
        $vacante = Vacante::findOrFail($id);
        $vacante->delete();

        return redirect()->route('vacantes.index')->with('success', 'Vacante eliminada con éxito');
    }
}
