<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function(Blueprint $table){
            $table->increments('id_cita');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('telefono');
            $table->string('correo',50);
            $table->string('calle',50);
            $table->integer('num_int');
            $table->integer('num_ext');
            $table->string('colonia',50);
            $table->integer('municipio_fk')->unsigned();
            $table->integer('estado_fk')->unsigned();

            $table->foreign('municipio_fk')->references('id_municipio')->on('municipios');
            $table->foreign('estado_fk')->references('id_estado')->on('estados');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citas');
    }
}
