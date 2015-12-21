<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuSubsistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_subsistema', function (Blueprint $table) {
            $table->bigIncrements('subsistema_id');
            $table->string('denominacion', 500);
            $table->string('denominacion_visual', 300);
            $table->string('path_logo', 500);
            $table->tinyInteger('habilitado_funcionario');
            $table->tinyInteger('habilitado_estudiante');
            $table->tinyInteger('habilitado_familiar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_subsistema');
    }
}
