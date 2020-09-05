<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_categoria');
            $table->string('nombreCuenta', 100)->unique();
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            $table->foreign('id_categoria','fk_naturaleza')->references('id')->on('naturaleza');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta');
    }
}
