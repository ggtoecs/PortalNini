<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacanteController extends Controller
{
    // Mostrar formulario para crear una nueva vacante
    public function create()
    {
        return view('vacantes.create');
    }

    // Guardar nueva vacante
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'salario' => 'required|numeric',
            'ubicacion' => 'required|string',
            'tipo_trabajo' => 'required|in:remoto,presencial',
        ]);

        Vacante::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'salario' => $request->salario,
            'ubicacion' => $request->ubicacion,
            'tipo_trabajo' => $request->tipo_trabajo,
            'empleador_id' => Auth::id(),  // El empleador es el usuario autenticado
        ]);

        return redirect()->route('vacantes.index')->with('success', 'Vacante publicada');
    }

    // Mostrar todas las vacantes del empleador autenticado
    public function index()
    {
        $vacantes = Vacante::where('empleador_id', Auth::id())->get();
        return view('vacantes.index', compact('vacantes'));
    }

    // Mostrar historial de vacantes publicadas
    public function historial()
    {
        $vacantes = Vacante::where('empleador_id', Auth::id())->get();
        return view('vacantes.historial', compact('vacantes'));
    }
     // Método para mostrar la vista de edición
     public function edit($id)
     {
         $vacante = Vacante::findOrFail($id);
         return view('vacantes.edit', compact('vacante'));
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
     public function __construct()
{
    $this->middleware('auth');
    $this->middleware('role:empleador')->only(['create', 'edit', 'destroy']);
}

}
