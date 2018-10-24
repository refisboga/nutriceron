<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_citas', function(Blueprint $table){
            $table->increments('id_det_cita');
            $table->integer('id_pac_fk')->unsigned();
            $table->integer('id_doc_fk')->unsigned();
			$table->integer('id_cita_fk')->unsigned();

            $table->foreign('id_pac_fk')->references('id_pac')->on('pacientes');
            $table->foreign('id_doc_fk')->references('id_doc')->on('doctores');
			$table->foreign('id_cita_fk')->references('id_cita')->on('citas');

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
        Schema::drop('det_citas');
    }
}
