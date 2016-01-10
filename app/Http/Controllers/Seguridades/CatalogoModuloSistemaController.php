<?php

namespace App\Http\Controllers\Seguridades;

use App\Repositories\secuModuloSistemaRepository as repoModulos;
use App\Repositories\secuGrupoOpcionesRepository as repoGruposOpciones;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Toastr;
use Crypt;


class CatalogoModuloSistemaController extends Controller
{

    private $repo_main;
    private $repo_grupos_opciones;

    public function __construct(repoModulos $repo_main, repoGruposOpciones $repo_grupos_opciones)
    {
        $this->repo_main = $repo_main;
        $this->repo_grupos_opciones = $repo_grupos_opciones;
    }


    public function index($grupo_opciones_id)
    {
        $grupo_opciones = $this->repo_grupos_opciones->find(Crypt::decrypt($grupo_opciones_id));
        return view('seguridades.catalogos.modulos_sistema.index', ['grupo' => $grupo_opciones]);
    }

    public function buscar_registros_dt($grupo_opciones_id)
    {
        return \Datatable::query($this->repo_main->buscar_todos_dt(Crypt::decrypt($grupo_opciones_id)))
            ->addColumn('orden',function($model)
            {
                return  $model->orden;
            })
            ->addColumn('denominacion',function($model)
            {
                return $model->denominacion . ' <span class="label"><i class="fa fa-desktop"></i> ' . $model->denominacion_visual . '</span>';
            })
            ->addColumn('controlador',function($model)
            {
                return  $model->controlador . ' <span class="label"><i class="fa fa-desktop"></i> ' . $model->vista . '</span>';
            })
            ->addColumn('commands',function($model)
            {
                return '<div class="btn-group">'
                . '<a href="' . url('seguridades/modulos_sistema/editar') . '/' . Crypt::encrypt($model->modulo_sistema_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-pencil"></i></a>'
                . '<a href="' . url('seguridades/modulos_sistema/eliminar') . '/' . Crypt::encrypt($model->modulo_sistema_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-trash-o"></i></a>&nbsp;'
                . '<a href="' . url('seguridades/modulos_acciones/listar') . '/' . Crypt::encrypt($model->modulo_sistema_id) . '" class="btn btn-complete btn-xs btn-mini"><i class="fa fa-th"></i></a>&nbsp;'
                . '</div>';
            })
            ->searchColumns(
                'modulo_sistema_id',
                'identificador_acceso',
                'orden',
                'denominacion',
                'denominacion_visual',
                'controlador',
                'vista',
                'thumbnail'
            )
            ->orderColumns(
                'modulo_sistema_id',
                'identificador_acceso',
                'orden',
                'denominacion',
                'denominacion_visual',
                'controlador',
                'vista',
                'thumbnail'
            )
            ->make();
    }

    public function crear($grupo_opciones_id)
    {
        $grupo_opciones = $this->repo_grupos_opciones->find(Crypt::decrypt($grupo_opciones_id));
        return view('seguridades.catalogos.modulos_sistema.crear', ['grupo' => $grupo_opciones]);
    }
    public function grabar_nuevo(Requests\Seguridades\crudModuloSistema $request)
    {
        if($this->repo_main->create($request->all()))
        {
            Toastr::success($this->repo_main->mensajes_ingreso, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_sistema/listar/' . Crypt::encrypt($request->grupo_opciones_id));
        }
        else
        {
            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_sistema/crear/' . Crypt::encrypt($request->grupo_opciones_id))->withInput();
        }
    }

    public function editar($id)
    {
        $registro = $this->repo_main->find(7);
        $grupo_opciones = $this->repo_grupos_opciones->find(1);

        return view('seguridades.catalogos.modulos_sistema.editar', ['grupo' => $grupo_opciones])->with('registro', $registro);
    }
    public function grabar_actualizar(Requests\Seguridades\crudModuloSistema $request)
    {
        if($this->repo_main->update($request->only(['identificador_acceso', 'orden', 'denominacion', 'denominacion_visual', 'controlador', 'vista', 'thumbnail']), Crypt::decrypt($request->id), 'modulo_sistema_id'))
        {
            Toastr::success($this->repo_main->mensajes_actualizacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_sistema/editar'.'/'.$request->id);
        }
        else
        {

            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_sistema/editar'.'/'.$request->id)->withInput();
        }
    }

    public function eliminar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        return view('seguridades.catalogos.modulos_sistema.eliminar')->with('registro', $registro);
    }
    public function grabar_eliminar(Request $request)
    {
        try {
            $this->repo_main->delete(Crypt::decrypt($request->id));
            Toastr::success($this->repo_main->mensajes_eliminacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/modulos_sistema/listar/' . $request->grupo_opciones_id);
        }
        catch(\Exception $e) {
            Toastr::error($e->getMessage(), $title = 'Error:', $options = []);
            return redirect('seguridades/modulos_sistema/eliminar'.'/'.$request->especialidad_id)->withInput();
        }
    }


}
