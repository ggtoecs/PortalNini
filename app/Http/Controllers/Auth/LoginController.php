<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the redirectTo method to handle custom redirection based on the user's role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Check the role of the user and redirect accordingly
        if (Auth::user()->role == 'empleador') {
            return route('vacantes.index'); // Redirect to the employer's vacancies page
        }else if (Auth::user()->role == 'postulante') {
            return route('postulantes.index'); // Redirect to the employer's vacancies page
        }

        // Default redirection for other users (candidates, etc.)
        return route('home');
    }
}
