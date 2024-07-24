<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud; 
use Carbon\Carbon;

class PlanningController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $aprobadas = Solicitud::where('status', 'Aprobado')->count();
        $pendientes = Solicitud::where('status', 'Pendiente')->count();
        $rechazadas = Solicitud::where('status', 'Rechazado')->count();
        $delDia = Solicitud::whereDate('arrival_time', $today)->count();

        return view('planning', compact('aprobadas', 'pendientes', 'rechazadas', 'delDia'));
    }
}
