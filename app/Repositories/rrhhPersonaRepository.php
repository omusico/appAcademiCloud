<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class rrhhPersonaRepository extends Repository
{

    function model()
    {
        return 'App\Models\rrhhPersona';
    }



    function reseteo_clave($username, $correo, $ie)
    {
        $existencia = $this->model->where('username', $username)->get()->count();

        if($existencia > 0)
        {
            $usuario = $this->findBy('username', $username);
            if($usuario->correo == $correo)
            {
                $nueva_clave = $usuario->generarClave();
                $password_hash = \Hash::make($nueva_clave);
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








}