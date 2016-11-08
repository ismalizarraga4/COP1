<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos',function(Blueprint $table){
            $table->increments('id_articulo');
            $table->string('descripcion');
            $table->string('modelo');
            $table->double('precio',7,2);
            $table->integer('existencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
