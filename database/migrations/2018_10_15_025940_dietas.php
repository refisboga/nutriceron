<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dietas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietas',function(Blueprint $table){
            $table->increments('id_dieta');
            $table->string('objetivo',30);
            $table->double('glucosa',3,3);
            $table->double('colesterol',3,3);
            $table->double('imc',3,3);
            $table->date('fecha');
            $table->text('cuidados');
            $table->text('restringidos');
            $table->text('permitidos');
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
        Schema::drop('dietas');
    }
}
