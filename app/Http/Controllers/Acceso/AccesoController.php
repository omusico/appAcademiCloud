<?php

namespace App\Http\Controllers\Acceso;

use App\Repositories\ConfigInstitucionRepository as repoIE;
use App\Repositories\ConfigUIFondoLoginRepository as repoBGs;
use App\Repositories\rrhhPersonaRepository as repoPersonas;
use App\Repositories\Criteria\Config\UIFondosActivos;

use App\Http\Requests\Acceso\ProcesarReseteo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccesoController extends Controller
{

    private $repo_ie;
    private $repo_bgs;
    private $repo_personas;

    public function __construct(repoIE $repo_ie, repoBGs $repo_bgs, repoPersonas $repo_personas)
    {
        $this->repo_ie = $repo_ie;
        $this->repo_bgs = $repo_bgs;
        $this->repo_personas = $repo_personas;
    }


    public function login()
    {
        $ie = $this->repo_ie->find(1);
        $bg = $this->repo_bgs->pushCriteria(new UIFondosActivos())->all()->random(1);

        return view('acceso.autenticacion.login', ['ie' => $ie, 'bg' => $bg]);
    }

    public function reseteo()
    {
        $ie = $this->repo_ie->find(1);

        return view('acceso.autenticacion.reseteo', ['ie' => $ie]);
    }
    public function pc_reseteo(Requests\Acceso\ProcesarReseteo $request)
    {
        $ie = $this->repo_ie->find(1);
        $resulset = $this->repo_personas->reseteo_clave($request->username,$request->correo, $ie);

        return $resulset;

    }



    public function test()
    {
        \Mail::queue('mails.acceso_reseteo_clave', array('NombresApellidos' => 'Test'), function($message)  {
            $message->from('noresponda@academi-cloud.com', 'AcademiCloud - Notificaciones');
            $message->to('edisson.mendieta@gmail.com', 'AcademiCloud - Reseteo de Clave de Acceso')->subject('Reseteo de Clave de Acceso - IE - AcademiCloud');

            $headers = $message->getHeaders();
            $headers->addTextHeader('X-MC-Template', env('MAIL_TEMPLATE'));
        });
        return 'ok';
    }
}
