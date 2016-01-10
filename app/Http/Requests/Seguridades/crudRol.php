<?php

namespace App\Http\Requests\Seguridades;

use App\Http\Requests\Request;

class crudRol extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subsistema_id' => 'required',
            'denominacion' => 'required',
            'denominacion_visual' => 'required',
            'activo' => 'required'
        ];
    }
}