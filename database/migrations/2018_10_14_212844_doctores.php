<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doctores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores',function(Blueprint $table) {
            $table->increments('id_doc');
            $table->string('nombre',40);
            $table->string('ap_pat',40);
            $table->string('ap_mat',40);
            $table->integer('tel');
            $table->string('correo',50);
            $table->string('pass',50);
			$table->integer('cedula');
            $table->string('tipo',20);

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
        Schema::drop('doctores');
    }
}
