<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\MejorarPerfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VacanteController extends Controller
{

    public function dashboard()
        {
            $user = Auth::user();

            // Verificar si el usuario tiene un perfil creado
            $perfil = MejorarPerfil::where('user_id', $user->id)->first();
        
            if (!$perfil) {
                // Si no existe, redirigir a la vista para crear perfil
                return redirect()->route('perfil.create');
            }
        
            // Si ya tiene perfil, cargar las vacantes
            $vacantes = Vacante::all();
        
            return view('dashboard', compact('vacantes'));
        }
        
    public function show($id, $empleador_id)
        {
            $vacante = Vacante::where('id', $id)
                            ->where('empleador_id', $empleador_id)
                            ->firstOrFail();
    
            $userHasApplied = $vacante->aplicaciones()->where('user_id', Auth::id())->exists();
        
            return view('vacantes.show', compact('vacante', 'userHasApplied'));
        }
    
        public function showPost($id, $empleador_id)
        {
            // Cargar la vacante con las aplicaciones y los usuarios asociados
            $vacante = Vacante::with(['empleador', 'aplicaciones.user.perfil'])->where('id', $id)->where('empleador_id', $empleador_id)->firstOrFail();
        
            // Obtener los postulantes con su descripción y CV
            $postulantes = $vacante->aplicaciones->map(function ($aplicacion) {
                // Acceder a los datos del perfil del usuario (como descripción y CV)
                $perfil = $aplicacion->user->perfil->first(); // Obtener el primer perfil del usuario (asumiendo que puede haber solo uno)
        
                return [
                    'nombre' => $aplicacion->user->name,
                    'descripcion' => $perfil->descripcion ?? 'Sin descripción disponible.',
                    'cv' => $perfil->cv ?? null,
                    'id' => $aplicacion->id
                ];
            });
        
            return view('vacantes.show_post', compact('vacante', 'postulantes'));
        }
        
        
        public function misVacantes()
            {
                $usuario_id = Auth::id(); // obtiene el id del usuario logeado
                $vacantes = Vacante::where('empleador_id', $usuario_id)->get();

                return view('vacantes.mis_vacantes', compact('vacantes'));
            }



        public function perfil()
            {
                $perfiles = MejorarPerfil::where('user_id', Auth::id())->get();
                return view('vacantes.perfil',  compact('perfiles'));
            }
        public function createPerfil()
            {
                return view('perfil.create');
            }

            public function storePerfil(Request $request)
            {
                $request->validate([
                    'descripcion' => 'nullable|string',  // Hacerlo opcional
                    'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',  // Hacerlo opcional
                ]);
            
                $data = [
                    'user_id' => Auth::id(),
                    'descripcion' => $request->descripcion ?: null,
                ];
            
                if ($request->hasFile('cv')) {
                    $cvPath = $request->file('cv')->store('cvs', 'public');
                    $data['cv'] = $cvPath;
                } else {
                    $data['cv'] = null;
                }
            
                MejorarPerfil::create($data);
            
                return redirect()->route('vacantes.perfil')->with('success', 'Perfil creado exitosamente.');
            }
            


        public function create(){
                return view('vacantes.create');
            }

        public function store(Request $request)
            {
                $request->validate([
                    'titulo' => 'required|string|max:255',
                    'descripcion' => 'required|string',
                    'salario' => 'required|numeric|min:0',
                    'ubicacion' => 'required|string|max:255',
                    'tipo_trabajo' => 'required|in:remoto,presencial',
                ]);
                    Vacante::create([
                    'titulo' => $request->titulo,
                    'descripcion' => $request->descripcion,
                    'salario' => $request->salario,
                    'ubicacion' => $request->ubicacion,
                    'tipo_trabajo' => $request->tipo_trabajo,
                    'empleador_id' => auth()->user()->id,
                ]);
            
                return redirect()->route('dashboard')->with('success', 'Vacante creada con éxito.');
            }



        public function editPerfil(MejorarPerfil $mejorarPerfil)
            {
                return view('perfil.edit', compact('mejorarPerfil'));
            }

        public function updatePerfil(Request $request, MejorarPerfil $mejorarPerfil)
            {
                $request->validate([
                    'descripcion' => 'required|string',
                    'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                ]);

                $data = [
                    'descripcion' => $request->descripcion,
                ];

                if ($request->hasFile('cv')) {
                    $cvPath = $request->file('cv')->store('cvs', 'public');
                    $data['cv'] = $cvPath;
                }

                $mejorarPerfil->update($data);

                return redirect()->route('vacantes.perfil')->with('success', 'Perfil actualizado correctamente.');
            }


        public function edit($id)
            {
                $vacante = Vacante::findOrFail($id);
                return view('vacantes.edit', compact('vacante'));
            }

        public function update(Request $request, $id)
            {
                $request->validate([
                    'titulo' => 'required|string|max:255',
                    'descripcion' => 'required|string',
                    'salario' => 'required|numeric',
                    'ubicacion' => 'required|string',
                    'tipo_trabajo' => 'required|string',
                ]);

                $vacante = Vacante::where('id', $id)
                ->where('empleador_id', Auth::id())
                ->firstOrFail();
              $vacante->update($request->all());

                return redirect()->route('vacantes.show', $vacante->id)->with('success', 'Vacante actualizada correctamente.');
            }



}
