<?php

namespace App\Http\Requests\Acceso;

use App\Http\Requests\Request;

class ActualizarClave extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password_actual' => 'required',
            'password_nuevo' => 'required',
            'password_confirmacion' => 'required',
        ];
    }
}