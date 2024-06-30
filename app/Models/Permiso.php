<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';

    protected $primaryKey = 'permiso_id';

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
