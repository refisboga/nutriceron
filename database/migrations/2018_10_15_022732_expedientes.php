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
			$table->text('alergia1');
			$table->text('alergia2');
			$table->text('enfermedad1');
			$table->text('enfermedad2');
            $table->char('cirugia',2);
			$table->text('tipo_cirugia');
            $table->char('tratamiento',2);
            $table->text('desc_tratamiento');
            $table->integer('pac_fk')->unsigned();

            $table->foreign('pac_fk')->references('id_pac')->on('pacientes');

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
