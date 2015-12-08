<?php

use Illuminate\Database\Seeder;

class rrhh_genero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rrhh_genero')->insert([
            'genero_id' => 3,
            'denominacion' => 'Masculino',
            'id_registro_civil' => 1,
            'icono' => 'fa fa-male',
            'avatar' => 'avatar_male.jpg'
        ]);
        DB::table('rrhh_genero')->insert([
            'genero_id' => 4,
            'denominacion' => 'Femenino',
            'id_registro_civil' => 2,
            'icono' => 'fa fa-female',
            'avatar' => 'avatar_female.jpg'
        ]);
    }
}
