<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas',function(Blueprint $table){
            $table->increments('id_venta');
            $table->integer('id_cliente');
            $table->double('cantidad_total',15,2);
            $table->date('fc_venta');
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
