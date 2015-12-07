<?php

namespace App\Http\Controllers\Acceso;

use App\Repositories\ConfigInstitucionRepository as repoIE;
use App\Repositories\ConfigUIFondoLoginRepository as repoBGs;
use App\Repositories\Criteria\Config\UIFondosActivos;

use App\Http\Requests\Acceso\ProcesarReseteo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccesoController extends Controller
{

    private $repo_ie;
    private $repo_bgs;

    public function __construct(repoIE $repo_ie, repoBGs $repo_bgs)
    {
        $this->repo_ie = $repo_ie;
        $this->repo_bgs = $repo_bgs;

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

        Mail::send('emails.reminder', ['user' => $ie], function ($m) use ($ie) {
            $m->from('hello@app.com', 'Your Application');
            $m->to('edisson.mendieta@gmail.com', 'Edisson mendieta')->subject('Your Reminder!');
        });

        return view('acceso.autenticacion.reseteo', ['ie' => $ie]);
    }

    public function test()
    {
        \Mail::queue('mails.acceso_reseteo_clave', array('NombresApellidos' => 'Test'), function($message)  {
            $message->from('hello@app.com', 'Your Application');
            $message->to('edisson.mendieta@gmail.com', 'MOGAC')->subject('Notificación Cambio de Clave | Ministerio de Educación | Módulo de Gestión de Atención Ciudadana');

            $headers = $message->getHeaders();
            $headers->addTextHeader('X-MC-Template', env('MAIL_TEMPLATE'));
        });
        return 'ok';
    }
}
