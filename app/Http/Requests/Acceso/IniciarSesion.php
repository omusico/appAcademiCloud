<?php

namespace App\Http\Requests\Acceso;

use App\Http\Requests\Request;

class IniciarSesion extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'rememberme' => 'required',
        ];
    }
}