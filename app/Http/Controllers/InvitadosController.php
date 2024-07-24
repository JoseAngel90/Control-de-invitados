<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Invitado;
use Carbon\Carbon;

class InvitadosController extends Controller
{
    // Método para mostrar la vista con los invitados del día
    public function index()
    {
        $today = Carbon::today();
        $invitados = Solicitud::whereDate('arrival_time', $today)->where('status', 'Aprobado')->get();


        
        return view('invitados', compact('invitados'));
    }

    // Método para realizar el check-in
    public function checkIn($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['error' => 'Solicitud no encontrada.'], 404);
        }

        if ($solicitud->status != 'Aprobado') {
            return response()->json(['error' => 'Solicitud no aprobada.'], 400);
        }

        // Insertar en la tabla invitados
        Invitado::create([
            'guest_name' => $solicitud->guest_name,
            'attendant' => $solicitud->attendee, // Aquí deberías obtener el nombre del atendiente desde tu lógica de negocio
            'arrival_date_time' => Carbon::now(),
        ]);

        // Actualizar el estado de la solicitud
        $solicitud->status = 'Check-in';
        $solicitud->save();

        return response()->json(['success' => 'Check-in realizado exitosamente.']);
    }
    public function cancel($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['error' => 'Solicitud no encontrada.'], 404);
        }

        if ($solicitud->status != 'Aprobado') {
            return response()->json(['error' => 'Solicitud no aprobada.'], 400);
        }

        // Insertar en la tabla invitados
        Invitado::create([
            'guest_name' => $solicitud->guest_name,
            'attendant' => $solicitud->attendee, // Aquí deberías obtener el nombre del atendiente desde tu lógica de negocio
            'arrival_date_time' => Carbon::now(),
        ]);

        // Actualizar el estado de la solicitud
        $solicitud->status = 'Cancelado';
        $solicitud->save();

        return response()->json(['success' => 'Cancelacion realizado exitosamente.']);
    }
}
