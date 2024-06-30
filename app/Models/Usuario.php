<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'usuario_id';

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function permisos()
    {
        return $this->rol->permisos;
    }
}
