<?php

use Illuminate\Database\Seeder;

class rrhhDependenciasPersonasPrincipales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call(rrhh_genero::class);
        $this->call(rrhh_persona_estado::class);
        $this->call(rrhh_tipo_identificacion::class);



    }
}
