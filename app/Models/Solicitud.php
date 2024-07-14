<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = [
        'guest_name',
        'visit_subject',
        'guest_origin',
        'attendee',
        'appointment_person',
        'arrival_time',
        'additional_guest',
        'vehicle_details',
    ];
}

