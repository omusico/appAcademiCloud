<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh_genero', function (Blueprint $table) {
            $table->bigIncrements('genero_id');
            $table->string('denominacion', 250);
            $table->string('id_registro_civil', 250);
            $table->string('icono', 250);
            $table->string('avatar', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rrhh_genero');
    }
}
