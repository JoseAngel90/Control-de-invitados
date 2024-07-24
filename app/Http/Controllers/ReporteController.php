<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class ReporteController extends Controller
{
    public function index()
    {
        $invitados = Solicitud::whereIn('status', ['Check-in', 'Cancelado'])->get();
        return view('reporte', compact('invitados'));
    }

}
