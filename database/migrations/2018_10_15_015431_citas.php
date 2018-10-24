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
			$table->string('dir',50);
			$table->integer('cp');
			$table->integer('tel');
            $table->string('correo',50);

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
