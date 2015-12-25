<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuSubsistema extends Model
{
    protected $table = 'secu_subsistema';
    protected $primaryKey = 'subsistema_id';
    protected $fillable = ['denominacion', 'denominacion_visual', 'habilitado_funcionario', 'habilitado_estudiante', 'habilitado_familiar', 'path_logo'];
    public $timestamps = false;

    public function grupos_opciones()
    {
        return $this->hasMany('App\Models\secuGrupoOpciones', 'subsistema_id');
    }
}
