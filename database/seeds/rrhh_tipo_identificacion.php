<?php

use Illuminate\Database\Seeder;

class rrhh_tipo_identificacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rrhh_tipo_identificacion')->insert([
            'tipo_identificacion_id' => 'C',
            'denominacion' => 'Cédula de Indentidad',
            'aplica_colaboradores' => true,
            'aplica_alumnos' => true,
            'aplica_familiares' => true
        ]);
        DB::table('rrhh_tipo_identificacion')->insert([
            'tipo_identificacion_id' => 'P',
            'denominacion' => 'Pasaporte',
            'aplica_colaboradores' => true,
            'aplica_alumnos' => true,
            'aplica_familiares' => true
        ]);
        DB::table('rrhh_tipo_identificacion')->insert([
            'tipo_identificacion_id' => 'R',
            'denominacion' => 'Carnet Refugiado',
            'aplica_colaboradores' => true,
            'aplica_alumnos' => true,
            'aplica_familiares' => true
        ]);
        DB::table('rrhh_tipo_identificacion')->insert([
            'tipo_identificacion_id' => 'N',
            'denominacion' => '[Ninguna]',
            'aplica_colaboradores' => false,
            'aplica_alumnos' => true,
            'aplica_familiares' => true
        ]);
    }
}
