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

use Auth;
use Session;
use Toastr;

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
        if (Auth::check()) {
            return redirect('inicio');
        }

        if (Auth::viaRemember()) {
            return redirect('inicio');
        }

        $ie = $this->repo_ie->find(1);
        $bg = $this->repo_bgs->pushCriteria(new UIFondosActivos())->all()->random(1);

        return view('acceso.autenticacion.login', ['ie' => $ie, 'bg' => $bg]);
    }

    public function iniciar_sesion(Requests\Acceso\IniciarSesion $request)
    {
        $recordar = $request->rememberme == 1 ? true : false;
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $recordar)) {
            $ie = $this->repo_ie->find(1);
            $usuario = $this->repo_personas->findBy('username', $request->username);

            Session::put('ses_ie_denominacion', $ie->denominacion);//$resultado[3]
            //Session::put('ses_menu', $usuario->generar_menu_acceso());
            Session::put('ses_usuario', $usuario->nombre_corto);

            if($usuario->path_avatar != null && $usuario->path_avatar != '')
            {
                Session::put('ses_usuario_avatar', $usuario->path_avatar);
            }
            else
            {
                Session::put('ses_usuario_avatar', $usuario->genero->avatar);
            }

            return redirect('inicio');
        }
        else
        {
            Toastr::warning('El nombre de usuario y/o clave de acceso son incorrectos', $title = 'Error', $options = []);
            return redirect('/')->withInput();
        }

    }


    //reseteo clave publico
    public function reseteo()
    {
        $ie = $this->repo_ie->find(1);

        return view('acceso.autenticacion.reseteo', ['ie' => $ie]);
    }

    public function resetear_clave(Requests\Acceso\ProcesarReseteo $request)
    {
        $ie = $this->repo_ie->find(1);
        $resulset = $this->repo_personas->resetear_clave($request->username,$request->correo, $ie);

        return $resulset;
    }


    //cerrar sesion del app
    public function cerrar_sesion()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');

    }

    public function inicio()
    {
        return view('acceso.dashboards.default');
    }



    public function actualizacion_clave()
    {
        return view('acceso.usuario.actualizacion_clave');
    }

    public function actualizar_clave(Requests\Acceso\ActualizarClave $request)
    {
        $ie = $this->repo_ie->find(1);
        $persona = Auth::user();
        $resulset = $this->repo_personas->actualizar_clave($request->password_actual, $request->password_nuevo,$persona, $ie);

        if($resulset[0] == 1)
        {
            Toastr::success($resulset[1], $title = 'Confirmación', $options = []);
            return redirect('inicio');
        }
        else
        {
            Toastr::warning($resulset[1], $title = 'Error', $options = []);
            return redirect('usuario/actualizacion_clave');
        }



    }

}
