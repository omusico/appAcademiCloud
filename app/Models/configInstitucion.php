<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class configInstitucion extends Model
{
    protected $table = 'config_institucion';
    protected $primaryKey = 'institucion_id';
    protected $fillable = ['denominacion', 'direccion', 'telefono_uno', 'telefono_dos', 'telefono_tres', 'correo_institucional', 'path_logo', 'colores_css'];
    public $timestamps = false;



    //
}
