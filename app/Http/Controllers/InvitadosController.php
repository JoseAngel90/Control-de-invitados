<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;

class InvitadosController extends Controller
{
    public function index()
    {
        // Get today's date
        $today = Carbon::today();

        // Fetch guests for today
        $invitados = Solicitud::whereDate('arrival_time', $today)->get();

        return view('invitados', compact('invitados'));
    }
}
