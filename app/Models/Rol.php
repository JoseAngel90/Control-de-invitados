<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    protected $primaryKey = 'rol_id';

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'rol_id');
    }
}
