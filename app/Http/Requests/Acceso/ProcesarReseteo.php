<?php

namespace App\Http\Requests\Acceso;

use App\Http\Requests\Request;

class ProcesarReseteo extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'identificacion' => 'required',
            'correo' => 'required|mail',
        ];
    }
}