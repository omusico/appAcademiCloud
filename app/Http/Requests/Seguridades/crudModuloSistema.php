<?php

namespace App\Http\Requests\Seguridades;

use App\Http\Requests\Request;

class crudModuloSistema extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'grupo_opciones_id' => 'required',
            'identificador_acceso' => 'required',
            'orden' => 'required|integer',
            'denominacion' => 'required',
            'denominacion_visual' => 'required',
            'controlador' => 'required',
            'thumbnail' => 'required'
        ];
    }
}