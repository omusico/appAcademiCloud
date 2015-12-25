<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuGrupoOpciones extends Model
{
    protected $table = 'secu_grupo_opciones';
    protected $primaryKey = 'grupo_opciones_id';
    protected $fillable = ['subsistema_id', 'orden', 'denominacion', 'denominacion_visual', 'thumbnail'];
    public $timestamps = false;

    public function subsistema()
    {
        return $this->belongsTo('App\Models\secuSubsistema', 'subsistema_id');
    }

    public function modulos()
    {
        return $this->hasMany('App\Models\secuModuloSistema', 'grupo_opciones_id');
    }

}
