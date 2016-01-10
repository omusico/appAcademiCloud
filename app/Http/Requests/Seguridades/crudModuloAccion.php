<?php

namespace App\Http\Requests\Seguridades;

use App\Http\Requests\Request;

class crudModuloAccion extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'modulo_sistema_id' => 'required',
            'denominacion' => 'required'
        ];
    }
}