<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('linea1', 250);
            $table->string('linea2', 250)->nullable();
            $table->BigInteger('idMunicipio')->unsigned();
            $table->foreign('idMunicipio')->references('id')->on('municipios');
            $table->BigInteger('idDepartamento')->unsigned();
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
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
        Schema::dropIfExists('direcciones');
    }
}
