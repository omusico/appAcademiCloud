<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class rrhhPersonaRepository extends Repository
{

    function model()
    {
        return 'App\Models\configInstitucion';
    }



    function validar_reseteo_clave($username, $correo)
    {

        $existencia = $this->model()->where('username', $username)->get()->count();

        if($existencia > 0)
        {
            $usuario = $this->findBy('username', $username);
            if($usuario->correo == $correo)
            {
                $nueva_clave = $usuario->generarClave();
                $password_hash = \Hash::make($nueva_clave);
                $this->update(['password' => $password_hash], $usuario->persona_id, 'persona_id');

            \Mail::queue('mails.acceso_reseteo_clave', array('NombresApellidos'=>$usuario->nombres . ' ' . $usuario->apellidos), function($message) use($usuario) {
                $message->to($usuario->correo, 'MOGAC')->subject('Notificación Cambio de Clave | Ministerio de Educación | Módulo de Gestión de Atención Ciudadana');
            });


                return array(1, 'Cambio realizado');
            }else
            {
                return array(0, 'La dirección de correo no coincide con la registrada para el usuario ingresado');
            }

        }else
        {
            return array(0, 'El nombre de usuario ingresado no existe');
        }
    }








}