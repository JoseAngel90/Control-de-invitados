<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;

class SolicitudesController extends Controller
{
    public function __construct()
    {
        ini_set('memory_limit', '256M'); // Increase memory limit
    }

    public function index()
    {
        $solicitudes = Solicitud::all()->map(function ($solicitud) {
            $solicitud->arrival_time = Carbon::parse($solicitud->arrival_time);
            return $solicitud;
        });

        return view('solicitudes', compact('solicitudes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guestName' => 'required|string|max:255',
            'visitSubject' => 'required|string|max:255',
            'guestOrigin' => 'required|string|max:255',
            'attendee' => 'required|string|max:255',
            'appointmentPerson' => 'required|string|max:255',
            'arrivalTime' => 'required|date',
            'additionalGuest' => 'nullable|string|max:255',
            'vehicleDetails' => 'nullable|string|max:255',
        ]);

        $solicitud = Solicitud::create([
            'guest_name' => $validatedData['guestName'],
            'visit_subject' => $validatedData['visitSubject'],
            'guest_origin' => $validatedData['guestOrigin'],
            'attendee' => $validatedData['attendee'],
            'appointment_person' => $validatedData['appointmentPerson'],
            'arrival_time' => $validatedData['arrivalTime'],
            'additional_guest' => $validatedData['additionalGuest'],
            'vehicle_details' => $validatedData['vehicleDetails'],
        ]);

        return response()->json(['success' => 'Solicitud creada con éxito.']);
    }

    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->arrival_time = Carbon::parse($solicitud->arrival_time);
        return response()->json($solicitud);
    }
    
    
    
}
