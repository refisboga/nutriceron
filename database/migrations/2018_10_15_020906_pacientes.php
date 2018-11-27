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
            $table->string('peso',20);
            $table->string('talla',20);
            $table->char('sexo',1);
            $table->date('fec_nac');
			$table->string('tipo',20);
            $table->string('calle',50);
            $table->integer('num_int');
            $table->integer('num_ext');
            $table->string('colonia',50);

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
