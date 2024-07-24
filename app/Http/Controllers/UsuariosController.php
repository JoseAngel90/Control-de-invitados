<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Usuarios; 
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    // Método para mostrar la vista de usuarios
    public function index()
    {
        $usuarios = Usuarios::all(); 
        return view('usuarios', compact('usuarios'));
    }

    // Método para guardar un nuevo usuario
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
            'status' => 'Habilitado' // Default status
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado correctamente.');
    }

    // Método para actualizar el estado del usuario
    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'action' => 'required|in:habilitar,deshabilitar,eliminar',
        ]);

        $usuario = Usuarios::findOrFail($validatedData['id']);

        switch ($validatedData['action']) {
            case 'habilitar':
                $usuario->status = 'Habilitado';
                break;
            case 'deshabilitar':
                $usuario->status = 'Deshabilitado';
                break;
            case 'eliminar':
                $usuario->delete();
                return response()->json(['success' => 'Usuario eliminado correctamente.']);
        }

        $usuario->save();
        return response()->json(['success' => 'Estado actualizado correctamente.', 'newStatus' => $usuario->status]);
    }

    // Método auxiliar para obtener el ID del rol
    private function getRoleId($roleName)
    {
        switch ($roleName) {
            case 'admin':
                return 1;
            case 'registrante':
                return 2;
            case 'vigilante':
                return 3;
            default:
                return 0;
        }
    }
}
