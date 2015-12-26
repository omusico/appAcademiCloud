<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuRol extends Model
{
    protected $table = 'secu_rol';
    protected $primaryKey = 'rol_id';
    protected $fillable = ['subsistema_id', 'denominacion', 'denominacion_visual', 'activo'];
    public $timestamps = false;

    public function subsistema()
    {
        return $this->belongsTo('App\Models\secuSubsistema', 'subsistema_id');
    }
    public function asignaciones_persona()
    {
        return $this->hasMany('App\Models\secuRolPersona', 'rol_id');
    }
    public function asignaciones_modulos()
    {
        return $this->hasMany('App\Models\secuRolModulo', 'rol_id');
    }
}
