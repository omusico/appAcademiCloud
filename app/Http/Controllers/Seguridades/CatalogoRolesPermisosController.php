<?php

namespace App\Http\Controllers\Seguridades;

use App\Repositories\secuRolRepository as repoRoles;
use App\Repositories\secuRolModuloRepository as repoPermisos;
use App\Repositories\secuModuloSistemaRepository as repoModulos;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Toastr;
use Crypt;


class CatalogoRolesPermisosController extends Controller
{

    private $repo_main;
    private $repo_roles;
    private $repo_modulos;

    public function __construct(repoPermisos $repo_main, repoRoles $repo_roles, repoModulos $repo_modulos)
    {
        $this->repo_main = $repo_main;
        $this->repo_roles = $repo_roles;
        $this->repo_modulos = $repo_modulos;

    }


    public function index($rol_id)
    {
        $rol = $this->repo_roles->find(Crypt::decrypt($rol_id));
        return view('seguridades.catalogos.roles_permisos.index', ['rol' => $rol]);
    }

    public function buscar_permisos_por_rol($rol_id)
    {
        return $this->repo_main->buscar_permisos_por_rol($rol_id);
    }

    public function buscar_modulos_disponibles($rol_id)
    {
        return $this->repo_main->buscar_modulos_disponibles($rol_id);
    }



    public function grabar_nuevo(Requests\Seguridades\crudRolModulo $request)
    {
        if($this->repo_main->create($request->all()))
        {
            return response()->json(['resultado' => 'ok', 'mensaje' => $this->repo_main->mensajes_ingreso ]);
        }
        else
        {
            return response()->json(['resultado' => 'error', 'mensaje' => 'No se ha podido ingresar el registro' ]);
        }
    }

    public function grabar_eliminar(Request $request)
    {
        try {
            $this->repo_main->delete($request->rol_modulo_id);
            return response()->json(['resultado' => 'ok', 'mensaje' => $this->repo_main->mensajes_eliminacion ]);
        }
        catch(\Exception $e) {
            return response()->json(['resultado' => 'error', 'mensaje' => $e->getMessage()]);
        }
    }


}
