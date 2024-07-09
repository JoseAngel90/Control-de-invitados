<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard') ; 
    }

    public function showSolicitudes()
    {
        /*$user = Auth::user();
        $solicitudes = [];

        if ($user->rol_id == 1) {
            $solicitudes = Solicitud::all();
        } elseif ($user->rol_id == 2) {
            $solicitudes = Solicitud::where('user_id', $user->id)->get();
        } elseif ($user->rol_id == 3) {
            $today = now()->toDateString();
            $solicitudes = Solicitud::where('estado', 'Aprobada')->whereDate('fecha', $today)->get();
        }

        return view('solicitudes', compact('solicitudes'));*/
        return view('solicitudes');
    }

    public function showUsuarios()
    {
        return view('usuarios');
    }
}
