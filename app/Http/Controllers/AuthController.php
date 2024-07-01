<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('AuthController: Intento de inicio de sesión para el usuario: ' . $credentials['email']);

        if (Auth::attempt($credentials)) {
            Log::info('AuthController: Credenciales válidas');
            $request->session()->regenerate();
            Log::info('AuthController: Sesión regenerada');
            
            // Redirigir a la vista de planeación para todos los usuarios
            return redirect()->route('dashboard');
        }

        Log::info('AuthController: Inicio de sesión fallido');
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
