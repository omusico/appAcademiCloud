<?php

namespace App\Http\Controllers\Seguridades;

use App\Repositories\secuGrupoOpcionesRepository as repoGruposOpciones;
use App\Repositories\secuSubsistemaRepository as repoSubsistemas;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Toastr;
use Crypt;


class CatalogoGrupoOpcionesController extends Controller
{

    private $repo_main;
    private $repo_susbistemas;

    public function __construct(repoGruposOpciones $repo_main, repoSubsistemas $repo_subsistemas)
    {
        $this->repo_main = $repo_main;
        $this->repo_susbistemas = $repo_subsistemas;
    }


    public function index()
    {
        return view('seguridades.catalogos.grupos_opciones.index');
    }

    public function buscar_registros_dt()
    {
        return \Datatable::query($this->repo_main->buscar_todos_dt())
            ->addColumn('orden',function($model)
            {
                return  $model->orden;
            })
            ->addColumn('subsistema',function($model)
            {
                return  $model->subsistema;
            })
            ->addColumn('denominacion',function($model)
            {
                return $model->denominacion . ' <span class="label"><i class="fa fa-desktop"></i> ' . $model->denominacion_visual . '</span>';
            })
            ->addColumn('commands',function($model)
            {
                return '<div class="btn-group">'
                . '<a href="' . url('seguridades/grupos_opciones/editar') . '/' . Crypt::encrypt($model->grupo_opciones_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-pencil"></i></a>'
                . '<a href="' . url('seguridades/grupos_opciones/eliminar') . '/' . Crypt::encrypt($model->grupo_opciones_id) . '" class="btn btn-default btn-xs btn-mini"><i class="fa fa-trash-o"></i></a>&nbsp;'
                . '<a href="' . url('seguridades/modulos_sistema/listar') . '/' . Crypt::encrypt($model->grupo_opciones_id) . '" class="btn btn-complete btn-xs btn-mini"><i class="fa fa-bars"></i></a>&nbsp;'
                . '</div>';
            })
            ->searchColumns(
                'secu_grupo_opciones.orden',
                'secu_grupo_opciones.denominacion',
                'secu_grupo_opciones.denominacion_visual',
                'secu_subsistema.denominacion'
            )
            ->orderColumns(
                'secu_grupo_opciones.orden',
                'secu_grupo_opciones.denominacion',
                'secu_grupo_opciones.denominacion_visual',
                'secu_subsistema.denominacion'
            )
            ->make();
    }

    public function crear()
    {
        $subsistemas = $this->repo_susbistemas->lists('denominacion', 'subsistema_id');
        return view('seguridades.catalogos.grupos_opciones.crear', ['subsistemas' => $subsistemas]);
    }
    public function grabar_nuevo(Requests\Seguridades\crudGrupoOpciones $request)
    {
        if($this->repo_main->create($request->all()))
        {
            Toastr::success($this->repo_main->mensajes_ingreso, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/grupos_opciones');
        }
        else
        {
            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/grupos_opciones/crear')->withInput();
        }
    }

    public function editar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        $subsistemas = $this->repo_susbistemas->lists('denominacion', 'subsistema_id');

        return view('seguridades.catalogos.grupos_opciones.editar', ['subsistemas' => $subsistemas])->with('registro', $registro);
    }
    public function grabar_actualizar(Requests\Seguridades\crudGrupoOpciones $request)
    {
        if($this->repo_main->update(['subsistema_id' => $request->subsistema_id, 'orden' => $request->orden, 'denominacion' => $request->denominacion, 'denominacion_visual' => $request->denominacion_visual, 'thumbnail' => $request->thumbnail], Crypt::decrypt($request->id), 'grupo_opciones_id'))
        {
            Toastr::success($this->repo_main->mensajes_actualizacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/grupos_opciones/editar'.'/'.$request->id);
        }
        else
        {

            Toastr::error('Ha ocurrido un error', $title = 'Error:', $options = []);
            return redirect('seguridades/grupos_opciones/editar'.'/'.$request->id)->withInput();
        }
    }

    public function eliminar($id)
    {
        $registro = $this->repo_main->find(Crypt::decrypt($id));
        return view('seguridades.catalogos.grupos_opciones.eliminar')->with('registro', $registro);
    }
    public function grabar_eliminar(Request $request)
    {
        try {
            $this->repo_main->delete(Crypt::decrypt($request->id));
            Toastr::success($this->repo_main->mensajes_eliminacion, $title = 'Confirmación:', $options = []);
            return redirect('seguridades/grupos_opciones');
        }
        catch(\Exception $e) {
            Toastr::error($e->getMessage(), $title = 'Error:', $options = []);
            return redirect('seguridades/grupos_opciones/eliminar'.'/'.$request->id)->withInput();
        }
    }


}
