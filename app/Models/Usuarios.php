<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
    protected $table = 'users'; 
    protected $fillable = ['name', 'email','password', 'rol_id'];
}
