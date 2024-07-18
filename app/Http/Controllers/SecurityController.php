<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;

class SecurityController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Fetch guests for today
        $invitadosHoy = Solicitud::whereDate('arrival_time', $today)->count();

        // Fetch guests that have already arrived
        $invitadosPasados = Solicitud::whereDate('arrival_time', '<', $today)->count();

        // Fetch guests that will arrive in the future
        $invitadosFuturos = Solicitud::whereDate('arrival_time', '>', $today)->count();

        // Fetch total guests
        $totalInvitados = Solicitud::count();

        return view('security', compact('invitadosHoy', 'invitadosPasados', 'invitadosFuturos', 'totalInvitados'));
    }
}
