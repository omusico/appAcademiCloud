<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class rrhhPersonaRepository extends Repository
{

    function model()
    {
        return 'App\Models\rrhhPersona';
    }



    function resetear_clave($username, $correo, $ie)
    {
        $existencia = $this->model->where('username', $username)->get()->count();

        if($existencia > 0)
        {
            $usuario = $this->findBy('username', $username);
            if($usuario->correo == $correo)
            {
                $nueva_clave = $usuario->generarClave();
                $password_hash = bcrypt($nueva_clave);
                $this->update(['password' => $password_hash], $usuario->persona_id, 'persona_id');

                \Mail::queue('mails.acceso_reseteo_clave', ['usuario'=>$usuario->nombre_corto, 'ie' => $ie->denominacion, 'nueva_clave' => $nueva_clave], function($message) use($usuario, $ie) {
                    $message->from(env('MAIL_NOREPLYADRESSS'), env('MAIL_NOREPLYNAME'));
                    $message->to($usuario->correo, $usuario->nombre_corto)->subject('Reseteo de Clave de Acceso - ' . $ie->denominacion . ' - AcademiCloud');

                    $headers = $message->getHeaders();
                    $headers->addTextHeader('X-MC-Template', env('MAIL_TEMPLATE'));
                });


                return array(1, 'La clave de acceso ha sido reseteada correctamente, en unos minutos recibirá un correo electrónico con la nueva clave.');
            }else
            {
                return array(0, 'La dirección de correo no coincide con la dirección registrada para el usuario ingresado.');
            }

        }else
        {
            return array(0, 'El nombre de usuario ingresado no existe.');
        }
    }

    public function iniciar_sesion($username, $password)
    {
        $existencia_us = rrhhPersona::where('username', '=', $username)->count();

        if ($existencia_us > 0)
        {
            $usuario = rrhhPersona::where('username', '=', $username)->first();
            if (\Hash::check($password, $usuario->password))
            {
                return array(1, 'Datos correstos');
            }else
            {
                return array(0, 'La clave de acceso ingresada es incorrecta!');
            }
        }
        else
        {
            return array(0, 'Identificación y/o clave de acceso incorrectos!');
        }

    }

    function actualizar_clave($password_actual, $password_nuevo, $persona, $ie)
    {

        if (\Hash::check($password_actual, $persona->password))
        {

            $password_hash = bcrypt($password_nuevo);
            $this->update(['password' => $password_hash], $persona->persona_id, 'persona_id');
            $date = Carbon::now();

            \Mail::queue('mails.acceso_actualizacion_clave', ['usuario' => $persona->nombre_corto, 'fecha' => $date->toDateTimeString()], function($message) use($persona, $ie) {
                $message->from(env('MAIL_NOREPLYADRESSS'), env('MAIL_NOREPLYNAME'));
                $message->to($persona->correo, $persona->nombre_corto)->subject('Actualización de Clave de Acceso - ' . $ie->denominacion . ' - AcademiCloud');

                $headers = $message->getHeaders();
                $headers->addTextHeader('X-MC-Template', env('MAIL_TEMPLATE'));
            });

            return array(1, 'La clave de acceso ha sido actualizada correctamente.');


        }else
        {
            return array(0, 'La clave anterior ingresada es incorrecta.');
        }
    }




}