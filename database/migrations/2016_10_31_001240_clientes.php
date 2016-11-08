<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes',function(Blueprint $table){
            $table->increments('id_cliente');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('rfc');
            $table->string('direccion');
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
