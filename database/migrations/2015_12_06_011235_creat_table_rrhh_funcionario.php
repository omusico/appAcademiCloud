<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTableRrhhFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh_funcionario', function (Blueprint $table) {
            $table->bigIncrements('funcionario_id');
            $table->bigInteger('persona_id')->unsigned();
            $table->string('titulo', 300)->nullable();
            $table->string('titulo_abreviatura', 30)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->string('telefono_fijo', 50)->nullable();
            $table->string('telefono_movil', 10)->nullable();
            $table->string('path_imagen', 250)->nullable();
            $table->foreign('persona_id')->references('persona_id')->on('rrhh_persona');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rrhh_funcionario');
    }
}
