<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuGrupoOpcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secu_grupo_opciones', function (Blueprint $table) {
            $table->bigIncrements('grupo_opciones_id');
            $table->bigInteger('subsistema_id')->unsigned();
            $table->integer('orden');
            $table->string('denominacion');
            $table->string('denominacion_visual');
            $table->string('thumbnail');

            $table->foreign('subsistema_id')->references('subsistema_id')->on('secu_subsistema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('secu_grupo_opciones');
    }
}
