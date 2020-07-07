<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sociales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contacto', 250);
            $table->string('detalle', 250)->nullable();
            $table->BigInteger('idRed')->unsigned();
            $table->foreign('idRed')->references('id')->on('redes');           
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
        Schema::dropIfExists('sociales');
    }
}
