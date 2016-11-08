<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Configuraciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones',function(Blueprint $table){
            $table->increments('id_conf');
            $table->double('tasa_financiamiento',5,2);
            $table->integer('enganche');
            $table->integer('plazo_max');
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
