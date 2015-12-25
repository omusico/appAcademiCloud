<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuRolPersona extends Model
{
    protected $table = 'secu_rol_persona';
    protected $primaryKey = 'rol_persona_id';
    protected $fillable = ['rol_id', 'persona_id', 'fecha_creacion'];
    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo('App\Models\rrhhPersona', 'persona_id');
    }
    public function rol()
    {
        return $this->belongsTo('App\Models\secuRol', 'rol_id');
    }
}
