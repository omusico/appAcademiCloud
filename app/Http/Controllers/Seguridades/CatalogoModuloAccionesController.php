<?php

namespace App\Http\Controllers\Seguridades;

use App\Repositories\secuModuloSistemaRepository as repoModulos;
use App\Repositories\secuGrupoOpcionesRepository as repoGruposOpciones;
use App\Repositories\secuModuloSistemaAccionRepository as repoAcciones;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Toastr;
use Crypt;


class CatalogoModuloAccionesController extends Controller
{

    private $repo_main;
    private $repo_grupos_opciones;
    private $repo_modulos;

    public function __construct(repoModulos $repo_modulos, repoGruposOpciones $repo_grupos_opciones, repoAcciones $repo_main)
    {
        $this->repo_main = $repo_main;
        $this->repo_grupos_opciones = $repo_grupos_opciones;
        $this->repo_modulos = $repo_modulos;

    }


    public function index($modulo_sistema_id)
    {
        $modulo = $this->repo_modulos->find(Crypt::decrypt($modulo_sistema_id));
        return view('seguridades.catalogos.modulos_acciones.index', ['modulo' => $modulo]);
    }

    public function buscar_registros_dt($modulo_sistema_id)
    {
        return \Datatable::query($this->repo_main->buscar_todos_dt(Crypt::decrypt($modulo_sistema_id)))
            ->addColumn('denominacion',function($model)
            {
                return $model->denominacion;
            })
            ->addColumn('commands',function($model)
            {
                return '<div class="btn-group">'
                . '<a href="' . url('seguridades/modulos_acciones/editar') . '/' . Crypt::encrypt($model->modulo_sistema_accion_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-pencil"></i></a>'
                . '<a href="' . url('seguridades/modulos_acciones/eliminar') . '/' . Crypt::encrypt($model->modulo_sistema_accion_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-trash-o"></i></a>&nbsp;'
                . '</div>';
            })
            ->searchColumns(
                'modulo_sistema_accion_id',
                'modulo_sistema_id',
                'denominacion'
            )
            ->orderColumns(
                'modulo_sistema_accion_id',
                'modulo_sistema_id',
                'denominacion'
            )
            ->make();
    }

    public function crear($modulo_sistema_id)
    {
        $modulo = $this->repo_modulos->find(Crypt::decrypt($modulo_sistema_id));
        return view('seguridades.catalogos.modulos_acciones.crear', ['modulo' => $modulo]);
    }
    public function grabar_nuevo(Requests\Seguridades\crudModuloAccion $request)
    {
        if($this->repo_main->create($request->all()))
        {
            Toastr::success($this->repo_main->mensajes_ingreso, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_acciones/listar/' . Crypt::encrypt($request->modulo_sistema_id));
        }
        else
        {
            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_acciones/crear/' . Crypt::encrypt($request->modulo_sistema_id))->withInput();
        }
    }

    public function editar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        $modulo = $this->repo_modulos->find($registro->modulo_sistema_id);

        return view('seguridades.catalogos.modulos_acciones.editar', ['modulo' => $modulo])->with('registro', $registro);
    }
    public function grabar_actualizar(Requests\Seguridades\crudModuloAccion $request)
    {
        if($this->repo_main->update($request->only(['denominacion']), Crypt::decrypt($request->id), 'modulo_sistema_accion_id'))
        {
            Toastr::success($this->repo_main->mensajes_actualizacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_acciones/editar'.'/'.$request->id);
        }
        else
        {

            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_acciones/editar'.'/'.$request->id)->withInput();
        }
    }

    public function eliminar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        return view('seguridades.catalogos.modulos_acciones.eliminar')->with('registro', $registro);
    }
    public function grabar_eliminar(Request $request)
    {
        try {
            $this->repo_main->delete(Crypt::decrypt($request->id));
            Toastr::success($this->repo_main->mensajes_eliminacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_acciones/listar/' . $request->modulo_sistema_id);
        }
        catch(\Exception $e) {
            Toastr::error($e->getMessage(), $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_acciones/eliminar'.'/'.$request->id)->withInput();
        }
    }


}
