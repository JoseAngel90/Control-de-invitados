<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; 
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all(); 
        return view('usuarios', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'rol' => 'required|in:admin,registrante,vigilante',
        ]);

        Usuarios::create([
            'name' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'rol_id' => $this->getRoleId($validatedData['rol']),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado correctamente.');
    }


    private function getRoleId($rol)
    {
        switch ($rol) {
            case 'admin':
                return 1; // Adjust based on your role IDs
            case 'registrante':
                return 2;
            case 'vigilante':
                return 3;
            default:
                return null;
        }
    }
}
