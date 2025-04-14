<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VacanteController extends Controller
{
    // Método para mostrar la vista de edición
    // public function edit($id)
    // {
    //     $vacante = Vacante::findOrFail($id);
    //     return view('vacantes.edit', compact('vacante'));
    // }

    public function dashboard()
    {
        $vacantes = Vacante::all();
        return view('dashboard', compact('vacantes'));
    }
    public function show($id, $empleador_id)
{
    $vacante = Vacante::where('id', $id)
                      ->where('empleador_id', $empleador_id)
                      ->firstOrFail();

    return view('vacantes.show', compact('vacante'));
}

public function misVacantes()
{
    $usuario_id = Auth::id(); // obtiene el id del usuario logeado
    $vacantes = Vacante::where('empleador_id', $usuario_id)->get();

    return view('vacantes.mis_vacantes', compact('vacantes'));
}


    public function create(){
        return view('vacantes.create');
    }

    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'salario' => 'required|numeric|min:0',
            'ubicacion' => 'required|string|max:255',
            'tipo_trabajo' => 'required|in:remoto,presencial',
        ]);
    
        // Crear la vacante con los datos validados
        Vacante::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'salario' => $request->salario,
            'ubicacion' => $request->ubicacion,
            'tipo_trabajo' => $request->tipo_trabajo,
            'empleador_id' => auth()->user()->id,
        ]);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Vacante creada con éxito.');
    }
    

    // Método para actualizar la vacante
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'titulo' => 'required',
    //         'descripcion' => 'required',
    //         'salario' => 'required|numeric',
    //         'ubicacion' => 'required',
    //         'tipo_trabajo' => 'required',
    //     ]);

    //     $vacante = Vacante::findOrFail($id);
    //     $vacante->update($request->all());

    //     return redirect()->route('vacantes.index')->with('success', 'Vacante actualizada con éxito');
    // }

    // // Método para eliminar la vacante
    // public function destroy($id)
    // {
    //     $vacante = Vacante::findOrFail($id);
    //     $vacante->delete();

    //     return redirect()->route('vacantes.index')->with('success', 'Vacante eliminada con éxito');
    // }
}
