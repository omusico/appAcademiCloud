<?php

namespace App\Repositories;

use App\Models\secuGrupoOpciones;
use App\Models\secuModuloSistema;
use App\Models\secuRol;
use App\Models\secuRolModulo;
use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class secuRolModuloRepository extends Repository
{

    function model()
    {
        return 'App\Models\secuRolModulo';
    }


    public function buscar_permisos_por_rol($rol_id)
    {
        $permisos_array = array();

        $modulos_ids = secuRolModulo::where('rol_id', $rol_id)->select('modulo_sistema_id')->get()->toArray();
        $grupos_ids = secuModuloSistema::whereIn('modulo_sistema_id', $modulos_ids)->select('grupo_opciones_id')->get()->toArray();

        $grupos_opciones = secuGrupoOpciones::whereIn('grupo_opciones_id', $grupos_ids)->get();

        foreach($grupos_opciones as $grupo)
        {
            $permisos = \DB::table('secu_rol_modulo')
                ->join('secu_modulo_sistema', 'secu_rol_modulo.modulo_sistema_id', '=', 'secu_modulo_sistema.modulo_sistema_id')
                ->where('secu_rol_modulo.rol_id', $rol_id)
                ->where('secu_modulo_sistema.grupo_opciones_id', $grupo->grupo_opciones_id)
                ->orderBy('secu_modulo_sistema.orden')
                ->orderBy('secu_modulo_sistema.denominacion')
                ->select(
                    'secu_rol_modulo.rol_modulo_id',
                    'secu_rol_modulo.modulo_sistema_id',
                    'secu_modulo_sistema.orden',
                    'secu_modulo_sistema.denominacion',
                    'secu_modulo_sistema.denominacion_visual',
                    'secu_modulo_sistema.controlador',
                    'secu_modulo_sistema.vista',
                    'secu_modulo_sistema.thumbnail'
                )
                ->get();

            array_push($permisos_array, [
                'grupo_opciones' => $grupo,
                'permisos' => $permisos
            ]);
        }

        return $permisos_array;
    }

    public function buscar_modulos_disponibles($rol_id)
    {
        $modulos_ids = secuRolModulo::where('rol_id', $rol_id)->select('modulo_sistema_id')->get()->toArray();
        $rol = secuRol::find($rol_id);

        $modulos = \DB::table('secu_modulo_sistema')
            ->join('secu_grupo_opciones', 'secu_modulo_sistema.grupo_opciones_id', '=', 'secu_grupo_opciones.grupo_opciones_id')
            ->whereNotIn('', $modulos_ids)
            ->where('secu_grupo_opciones.subsistema_id', $rol->subsistema_id)
            ->orderBy('secu_modulo_sistema.orden')
            ->orderBy('secu_modulo_sistema.denominacion')
            ->select(
                'secu_modulo_sistema.modulo_sistema_id',
                'secu_modulo_sistema.orden',
                'secu_modulo_sistema.denominacion',
                'secu_modulo_sistema.denominacion_visual',
                'secu_modulo_sistema.controlador',
                'secu_modulo_sistema.vista',
                'secu_modulo_sistema.thumbnail',
                'secu_grupo_opciones.denominacion as grupo'
            )
            ->get();

        return $modulos;
    }





}