<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuModuloSistemaAccion extends Model
{
    protected $table = 'secu_modulo_sistema_accion';
    protected $primaryKey = 'modulo_sistema_accion_id';
    protected $fillable = ['modulo_sistema_id', 'denominacion'];
    public $timestamps = false;


    public function modulo()
    {
        return $this->belongsTo('App\Models\secuModuloSistema', 'modulo_sistema_id');
    }


}
