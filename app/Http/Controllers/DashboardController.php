<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function showAdmin()
    {
        return view('Admin');
    }

    public function showRegistrante()
    {
        return view('Director');
    }

    public function showVigilante()
    {
        return view('security');
    }

    public function showSolicitudes()
    {
        return view('solicitudes');
    }

    public function showUsuarios()
    {
        return view('usuarios');
    }

    public function showInvitados()
    {
        return view('invitados');
    }
}
