<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Solicitud;

class DirectorController extends Controller
{
    public function index()
    {
        $totalSolicitudes = Solicitud::count();
        $today = Carbon::today();
        $solicitudesHoy = Solicitud::whereDate('arrival_time', $today)->get();
        $totalSolicitudesHoy = $solicitudesHoy->count();

        return view('director', compact('totalSolicitudes', 'totalSolicitudesHoy', 'solicitudesHoy'));
    }
}
