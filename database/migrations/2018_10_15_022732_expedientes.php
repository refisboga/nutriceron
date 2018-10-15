<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expedientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function(Blueprint $table){
            $table->increments('id_exp');
            $table->date('fecha');
            $table->time('hora');
            $table->char('tipo_sangre',3);
            $table->string('alergia1',30);
            $table->string('alergia2',30);
            $table->string('enfermedad1',30);
            $table->string('enfermedad2',30);
            $table->char('cirugia',2);
            $table->string('tipo_cirugia',30);
            $table->char('tratamiento',2);
            $table->text('desc_tratamienot');
            $table->integer('pac_fk')->unsigned();
            $table->integer('doc_fk')->unsigned();

            $table->foreign('pac_fk')->references('id_pac')->on('pacientes');
            $table->foreign('doc_fk')->references('id_doc')->on('doctores');

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
        Schema::drop('expedientes');
    }
}
