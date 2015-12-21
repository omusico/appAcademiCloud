<?php

use Illuminate\Database\Seeder;

class secu_subsistemas_inicializacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secu_subsistema')->insert([
            'denominacion' => 'Subsistema Funcionarios',
            'denominacion_visual' => 'Funcionario',
            'path_logo' => '1',
            'habilitado_funcionario' => 1,
            'habilitado_estudiante' => 0,
            'habilitado_familiar' => 0
        ]);
        DB::table('secu_subsistema')->insert([
            'denominacion' => 'Subsistema Estudiantes',
            'denominacion_visual' => 'Estudiante',
            'path_logo' => '1',
            'habilitado_funcionario' => 0,
            'habilitado_estudiante' => 1,
            'habilitado_familiar' => 0
        ]);
        DB::table('secu_subsistema')->insert([
            'denominacion' => 'Subsistema Representantes',
            'denominacion_visual' => 'Representante',
            'path_logo' => '1',
            'habilitado_funcionario' => 0,
            'habilitado_estudiante' => 0,
            'habilitado_familiar' => 1
        ]);
    }
}
