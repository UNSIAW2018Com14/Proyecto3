<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfrentamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfrentamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('idEnfrentamiento');
            $table->string('equipo1');
            $table->string('equipo2');
            $table->string('editor');
            $table->json('bo5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfrentamientos');
    }
}
