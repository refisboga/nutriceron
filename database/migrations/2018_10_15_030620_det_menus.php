<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_menus', function(Blueprint $table){
            $table->increments('id_det_menu');
            $table->integer('dieta_fk')->unsigned();
            $table->integer('menu_fk')->unsigned();

            $table->foreign('dieta_fk')->references('id_dieta')->on('dietas');
            $table->foreign('menu_fk')->references('id_menu')->on('menus');

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
        Schema::drop('det_menus');
    }
}
