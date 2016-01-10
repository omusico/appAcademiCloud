<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class secuModuloSistemaRepository extends Repository
{

    function model()
    {
        return 'App\Models\secuModuloSistema';
    }


    public function buscar_todos_dt($grupo_opciones_id)
    {
        return \DB::table('secu_modulo_sistema')
            ->orderBy('orden')
            ->where('grupo_opciones_id', $grupo_opciones_id)
            ->select(
                'modulo_sistema_id',
                'identificador_acceso',
                'orden',
                'denominacion',
                'denominacion_visual',
                'controlador',
                'vista',
                'thumbnail'
            );
    }



}