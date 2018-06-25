<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBo5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bo5s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('idBo5');
            $table->string('dia');
            $table->string('fechaInicio');
            $table->string('fechaFin');
            $table->json('enfrentamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bo5s');
    }
}
