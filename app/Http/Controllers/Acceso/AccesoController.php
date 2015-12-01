<?php

namespace App\Http\Controllers\Acceso;

use App\Repositories\ConfigInstitucionRepository as repoIE;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccesoController extends Controller
{

    private $repo_ie;

    public function __construct(repoIE $repo_ie)
    {
        $this->repo_ie = $repo_ie;
    }


    public function login()
    {
        $ie = $this->repo_ie->find(1);
        return view('acceso.autenticacion.login', ['ie' => $ie]);
    }



}
