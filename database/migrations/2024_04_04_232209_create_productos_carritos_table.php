<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stock');
            $table->unsignedInteger('cantidad');
        });

        Schema::table('productos_carritos', function (Blueprint $table) {
            $table->foreign('id_stock')->references('id')->on('stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_carritos');
    }
}
