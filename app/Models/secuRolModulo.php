<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class secuRolModulo extends Model
{
    protected $table = 'secu_rol_modulo';
    protected $primaryKey = 'rol_modulo_id';
    protected $fillable = ['rol_id', 'modulo_sistema_id'];
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo('App\Models\secuRol', 'rol_id');
    }
    public function modulo()
    {
        return $this->belongsTo('App\Models\secuModuloSistema', 'modulo_sistema_id');
    }
    public function acciones()
    {
        return $this->hasMany('App\Models\secuRolModuloAccion', 'rol_modulo_id');
    }
}
