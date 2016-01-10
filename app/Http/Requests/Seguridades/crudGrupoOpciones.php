<?php

namespace App\Http\Requests\Seguridades;

use App\Http\Requests\Request;

class crudGrupoOpciones extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subsistema_id' => 'required',
            'orden' => 'required|integer',
            'denominacion' => 'required',
            'denominacion_visual' => 'required',
            'thumbnail' => 'required'
        ];
    }
}