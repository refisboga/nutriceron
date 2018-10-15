<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function(Blueprint $table){
            $table->increments('id_pac');
            $table->string('nombre',50);
            $table->string('ap_pat',50);
            $table->string('ap_mat',50);
            $table->string('correo',50);
            $table->string('pass',50);
            $table->integer('telefono');
            $table->double('peso',3,3);
            $table->double('talla',2,2);
            $table->char('sexo',1);
            $table->date('fec_nac');
            $table->string('calle',50);
            $table->integer('num_int');
            $table->integer('num_ext');
            $table->string('colonia');
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
        Schema::drop('pacientes');
    }
}
