<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'name', 'email', 'password', 'rol_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function permisos()
    {
        return $this->rol->permisos;
    }
}
