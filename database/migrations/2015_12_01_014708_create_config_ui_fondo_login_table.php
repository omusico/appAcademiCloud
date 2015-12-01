<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigUiFondoLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_ui_fondo_login', function (Blueprint $table) {
            $table->bigIncrements('fondo_id');
            $table->string('denominacion', 500);
            $table->string('slogan', 500);
            $table->string('path', 500);
            $table->boolean('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('config_ui_fondo_login');
    }
}
