<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhTipoIdentificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh_tipo_identificacion', function (Blueprint $table) {
            $table->string('tipo_identificacion_id', 1)->primary();
            $table->string('denominacion', 250);
            $table->tinyInteger('aplica_colaboradores');
            $table->tinyInteger('aplica_alumnos');
            $table->tinyInteger('aplica_familiares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rrhh_tipo_identificacion');
    }
}
