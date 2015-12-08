<?php

use Illuminate\Database\Seeder;

class rrhh_persona_estado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rrhh_persona_estado')->insert([
            'persona_estado_id' => 1,
            'denominacion' => 'Activo',
            'permite_inicio_sesion' => true,
            'css_class' => 'success'
        ]);
        DB::table('rrhh_persona_estado')->insert([
            'persona_estado_id' => 2,
            'denominacion' => 'Suspension Temporal',
            'permite_inicio_sesion' => false,
            'css_class' => 'important'
        ]);
        DB::table('rrhh_persona_estado')->insert([
            'persona_estado_id' => 3,
            'denominacion' => 'Suspendido',
            'permite_inicio_sesion' => false,
            'css_class' => 'important'
        ]);
    }
}
