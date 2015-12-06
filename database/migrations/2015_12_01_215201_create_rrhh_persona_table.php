<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh_persona', function (Blueprint $table) {
            $table->bigIncrements('persona_id');
            $table->bigInteger('persona_estado_id')->unsigned();
            $table->bigInteger('genero_id')->unsigned();
            $table->string('tipo_identificacion_id', 1);
            $table->string('identificacion', 30)->nullable();
            $table->string('apellidos', 250);
            $table->string('nombres', 250);
            $table->string('nombre_corto', 250);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('username', 100);
            $table->string('password', 700);
            $table->string('remember_token', 255);
            $table->boolean('requiere_cambio_clave');
            $table->date('fecha_creacion');

            $table->foreign('tipo_identificacion_id')->references('tipo_identificacion_id')->on('rrhh_tipo_identificacion');
            $table->foreign('genero_id')->references('genero_id')->on('rrhh_genero');
            $table->foreign('persona_estado_id')->references('persona_estado_id')->on('rrhh_persona_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rrhh_persona');
    }
}
