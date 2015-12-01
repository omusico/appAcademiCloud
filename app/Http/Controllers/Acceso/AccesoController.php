<?php

namespace App\Http\Controllers\Acceso;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccesoController extends Controller
{

    public function login()
    {
        return view('acceso.autenticacion.login');
    }


}
