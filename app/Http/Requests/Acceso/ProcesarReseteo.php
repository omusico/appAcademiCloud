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
            'username' => 'required',
            'correo' => 'required|email',
        ];
    }
}