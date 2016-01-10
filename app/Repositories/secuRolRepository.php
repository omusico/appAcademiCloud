<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class secuRolRepository extends Repository
{

    function model()
    {
        return 'App\Models\secuRol';
    }


    public function buscar_todos_dt()
    {
        return \DB::table('secu_rol')
            ->join('secu_subsistema', 'secu_rol.subsistema_id', '=', 'secu_subsistema.subsistema_id')
            ->orderBy('secu_subsistema.subsistema_id')
            ->orderBy('secu_rol.denominacion')
            ->select(
                'secu_rol.rol_id',
                'secu_rol.subsistema_id',
                'secu_rol.denominacion',
                'secu_rol.denominacion_visual',
                'secu_rol.activo',
                'secu_subsistema.denominacion as subsistema'
            );
    }



}