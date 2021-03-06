<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preservicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicio', 250);
            $table->string('detalle', 250)->nullable();                      
            $table->BigInteger('idPersona')->unsigned();
            $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');
            $table->boolean('condicion')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preservicios');
    }
}
