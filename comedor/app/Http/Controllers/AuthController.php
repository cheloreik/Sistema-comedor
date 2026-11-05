<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

    // reestablecer contraS
    $key = Str::lower($request->email).'|'.$request->ip();

if (Auth::attempt($credenciales)) {

    RateLimiter::clear($key);

    $request->session()->regenerate();

    return redirect()->route('dashboard');
}


RateLimiter::hit($key);

// Verifica si acaba de llegar a 3
if (RateLimiter::attempts($key) >= 3) {
    return back()->with('alerta',
        'Has superado los 3 intentos permitidos. Recupera sus credenciles en RRHH con el adminstrador.'
    );
}


return back()->withErrors([
    'email' => 'Correo o contraseña incorrectos.'
]);


}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}