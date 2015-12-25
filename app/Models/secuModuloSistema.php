<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuModuloSistema extends Model
{
    protected $table = 'secu_modulo_sistema';
    protected $primaryKey = 'grupo_opciones_id';
    protected $fillable = ['grupo_opciones_id', 'identificador_acceso', 'denominacion', 'denominacion_visual', 'controlador', 'vista', 'thumbnail'];
    public $timestamps = false;


    public function grupo_opciones()
    {
        return $this->belongsTo('App\Models\secuGrupoOpciones', 'grupo_opciones_id');
    }


}
