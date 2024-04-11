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
            $table->id();

            $table->unsignedBigInteger('id_entrega');

            $table->string('pais', 20);
            $table->string('cp', 20);
            $table->string('colonia', 20);
            $table->string('estado', 20);
            $table->string('direccion', 30);
        });

        Schema::table('direcciones', function (Blueprint $table) {
            $table->foreign('id_entrega')->references('id')->on('entregas')->onDelete('cascade');
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
