<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuRolModuloAccion extends Model
{
    protected $table = 'secu_rol_modulo_accion';
    protected $primaryKey = 'rol_modulo_accion_id';
    protected $fillable = ['rol_modulo_id', 'modulo_sistema_accion_id', 'permitido'];
    public $timestamps = false;

    public function asignacion()
    {
        return $this->belongsTo('App\Models\secuRolModulo', 'rol_modulo_id');
    }
}
