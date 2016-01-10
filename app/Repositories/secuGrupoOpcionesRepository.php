<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class secuGrupoOpcionesRepository extends Repository
{

    function model()
    {
        return 'App\Models\secuGrupoOpciones';
    }


    public function buscar_todos_dt()
    {
        return \DB::table('secu_grupo_opciones')
            ->join('secu_subsistema', 'secu_grupo_opciones.subsistema_id', '=', 'secu_subsistema.subsistema_id')
            ->orderBy('secu_subsistema.subsistema_id')
            ->orderBy('secu_grupo_opciones.orden')
            ->select(
                'secu_grupo_opciones.grupo_opciones_id',
                'secu_grupo_opciones.subsistema_id',
                'secu_grupo_opciones.orden',
                'secu_grupo_opciones.denominacion',
                'secu_grupo_opciones.denominacion_visual',
                'secu_grupo_opciones.thumbnail',
                'secu_subsistema.denominacion as subsistema'
            );
    }



}