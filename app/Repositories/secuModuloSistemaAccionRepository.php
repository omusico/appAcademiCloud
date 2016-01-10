<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class secuModuloSistemaAccionRepository extends Repository
{

    function model()
    {
        return 'App\Models\secuModuloSistemaAccion';
    }


    public function buscar_todos_dt($modulo_sistema_id)
    {
        return \DB::table('secu_modulo_sistema_accion')
            ->orderBy('denominacion')
            ->where('modulo_sistema_id', $modulo_sistema_id)
            ->select(
                'modulo_sistema_accion_id',
                'modulo_sistema_id',
                'denominacion'
            );
    }




}