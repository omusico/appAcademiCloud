<?php

namespace App\Http\Controllers\Seguridades;

use App\Repositories\secuRolRepository as repoRoles;
use App\Repositories\secuSubsistemaRepository as repoSubsistemas;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Toastr;
use Crypt;


class CatalogoRolesController extends Controller
{

    private $repo_main;
    private $repo_susbistemas;

    public function __construct(repoRoles $repo_main, repoSubsistemas $repo_subsistemas)
    {
        $this->repo_main = $repo_main;
        $this->repo_susbistemas = $repo_subsistemas;
    }


    public function index()
    {
        return view('seguridades.catalogos.roles.index');
    }

    public function buscar_registros_dt()
    {
        return \Datatable::query($this->repo_main->buscar_todos_dt())
            ->addColumn('subsistema',function($model)
            {
                return  $model->subsistema;
            })
            ->addColumn('denominacion',function($model)
            {
                return $model->denominacion . ' <span class="label"><i class="fa fa-desktop"></i> ' . $model->denominacion_visual . '</span>';
            })
            ->addColumn('activo',function($model)
            {
                if($model->activo == 1)
                {
                    return '<i class="fa fa-check-square-o"></i>';
                }
                else
                {
                    return '<i class="fa fa-square-o"></i>';
                }
            })
            ->addColumn('commands',function($model)
            {
                return '<div class="btn-group">'
                . '<a href="' . url('seguridades/roles/editar') . '/' . Crypt::encrypt($model->rol_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-pencil"></i></a>'
                . '<a href="' . url('seguridades/roles/eliminar') . '/' . Crypt::encrypt($model->rol_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-trash-o"></i></a>&nbsp;'
                . '<a href="' . url('seguridades/rol_permisos/listar') . '/' . Crypt::encrypt($model->rol_id) . '" class="btn btn-complete btn-xs btn-mini"><i class="fa fa-bars"></i> Permisos</a>'
                . '</div>';
            })
            ->searchColumns(
                'secu_rol.subsistema_id',
                'secu_rol.denominacion',
                'secu_rol.denominacion_visual',
                'secu_rol.activo',
                'secu_subsistema.denominacion'
            )
            ->orderColumns(
                'secu_rol.subsistema_id',
                'secu_rol.denominacion',
                'secu_rol.denominacion_visual',
                'secu_rol.activo',
                'secu_subsistema.denominacion'
            )
            ->make();
    }

    public function crear()
    {
        $subsistemas = $this->repo_susbistemas->lists('denominacion', 'subsistema_id');
        return view('seguridades.catalogos.roles.crear', ['subsistemas' => $subsistemas]);
    }
    public function grabar_nuevo(Requests\Seguridades\crudRol $request)
    {
        if($this->repo_main->create($request->all()))
        {
            Toastr::success($this->repo_main->mensajes_ingreso, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/roles');
        }
        else
        {
            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/roles/crear')->withInput();
        }
    }

    public function editar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        $subsistemas = $this->repo_susbistemas->lists('denominacion', 'subsistema_id');

        return view('seguridades.catalogos.roles.editar', ['subsistemas' => $subsistemas])->with('registro', $registro);
    }
    public function grabar_actualizar(Requests\Seguridades\crudRol $request)
    {
        if($this->repo_main->update($request->only(['subsistema_id', 'denominacion', 'denominacion_visual', 'activo']), Crypt::decrypt($request->id), 'rol_id'))
        {
            Toastr::success($this->repo_main->mensajes_actualizacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/roles/editar'.'/'.$request->id);
        }
        else
        {

            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/roles/editar'.'/'.$request->id)->withInput();
        }
    }

    public function eliminar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        return view('seguridades.catalogos.roles.eliminar')->with('registro', $registro);
    }
    public function grabar_eliminar(Request $request)
    {
        try {
            $this->repo_main->delete(Crypt::decrypt($request->id));
            Toastr::success($this->repo_main->mensajes_eliminacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/roles');
        }
        catch(\Exception $e) {
            Toastr::error($e->getMessage(), $title = 'Error:', $options = []);
            return redirect('seguridades/roles/eliminar'.'/'.$request->id)->withInput();
        }
    }


}
