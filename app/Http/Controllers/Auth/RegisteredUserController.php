<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol; // Agregar el modelo Rol
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Obtener todos los roles de la base de datos
        $roles = Rol::all();
        return view('auth.register', compact('roles')); // Pasar los roles a la vista
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // Validación de los datos del formulario
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'rol_id' => ['required', 'exists:roles,id'],
    ]);

    // Crear el usuario con el rol seleccionado
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol_id' => $request->rol_id,
    ]);

    // Crear un perfil vacío para el usuario recién creado
    $user->perfil()->create([
        // Puedes agregar campos adicionales si lo deseas
        'descripcion' => '',  // Por ejemplo, dejar la descripción vacía inicialmente
        'cv' => '',           // Y dejar el CV vacío inicialmente
    ]);

    // Desencadenar el evento Registered
    event(new Registered($user));

    // Iniciar sesión automáticamente
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

}
