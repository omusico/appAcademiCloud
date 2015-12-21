<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class rrhhUsuarioAdministrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rrhh_persona')->insert([
            'persona_estado_id' => 1,
            'genero_id' => '3',
            'tipo_identificacion_id' => 'C',
            'identificacion' => '0103951703',
            'apellidos' => 'Edisson René',
            'nombres' => 'Mendieta Saquinaula',
            'nombre_corto' => 'Edisson Mendieta',
            'fecha_nacimiento' => Carbon::parse('07/23/1987'),
            'correo' => 'edisson.mendieta@gmail.com',
            'username' => '0103951703',
            'password' => '$2y$10$cjt7Is0CgzSCvQT3Hcy9COYLG3eUYh99M0hEGarc2xqdhZzn/pCoC',
            'requiere_cambio_clave' => false,
            'fecha_creacion' => Carbon::now(),
            'habilitado_funcionario' => 1,
            'habilitado_estudiante' => 0,
            'habilitado_familiar' => 0
        ]);
    }
}
