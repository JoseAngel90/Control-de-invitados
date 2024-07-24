<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    protected $table = 'invitados';
    protected $fillable = ['guest_name', 'attendant', 'arrival_date_time'];
}

