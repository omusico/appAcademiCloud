<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class rrhhPersona extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'rrhh_persona';
    protected $primaryKey = 'persona_id';
    protected $fillable = ['persona_estado_id', 'genero_id', 'tipo_identificacion_id', 'identificacion', 'apellidos', 'nombres', 'nombre_corto', 'fecha_nacimiento', 'correo', 'username', 'password', 'remember_token', 'requiere_cambio_clave', 'fecha_creacion', 'path_avatar', 'habilitado_funcionario', 'habilitado_estudiante', 'habilitado_familiar'];
    public $timestamps = false;


    public function genero()
    {
        return $this->belongsTo('App\Models\rrhhGenero', 'genero_id');
    }




    public function getNombreCorto1Attribute()
    {
        $nombres = explode(" ", $this->attributes['nombre_corto']);
        return ucwords(strtolower($nombres[0]));
    }

    public function getNombreCorto2Attribute()
    {
        $nombres = explode(" ", $this->attributes['nombre_corto']);
        return ucwords(strtolower($nombres[1]));
    }

    function generarClave($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


    //
}
