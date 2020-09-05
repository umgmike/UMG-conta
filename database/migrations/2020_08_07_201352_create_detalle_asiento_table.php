<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asiento', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedInteger('id_asiento')->nullable();
            $table->unsignedInteger('id_cuenta')->nullable();
            $table->double('debe')->nullable();
            $table->double('haber')->nullable();
            $table->timestamps();
            $table->foreign('id_cuenta','fk_cuenta')->references('id')->on('cuenta')->nullable();
            $table->foreign('id_asiento','fk_asiento')->references('id')->on('asiento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_asiento');
    }
}
