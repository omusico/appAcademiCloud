<?php

namespace App\Http\Requests\Seguridades;

use App\Http\Requests\Request;

class crudRolModulo extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rol_id' => 'required',
            'modulo_sistema_id' => 'required'
        ];
    }
}