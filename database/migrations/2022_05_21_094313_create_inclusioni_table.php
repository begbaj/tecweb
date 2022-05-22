<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclusioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclusioni', function (Blueprint $table) {
            $table->bigInteger('id_alloggio');
	    $table->bigInteger('id_servizio');
            $table->timestamps();

	    $table->primary(['id_alloggio', 'id_servizio']);

	    $table->foreign('id_alloggio')->references('id')->on('alloggi');
	    $table->foreign('id_servizio')->references('id')->on('servizi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inclusioni');
    }
}
