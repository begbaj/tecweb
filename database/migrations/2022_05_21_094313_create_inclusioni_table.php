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
            $table->unsignedBigInteger('id_alloggio');
	    $table->unsignedBigInteger('id_servizio');
            $table->timestamps();

	    $table->foreign('id_alloggio')->references('id')->on('alloggi')->onDelete('cascade');
	    $table->foreign('id_servizio')->references('id')->on('servizi');

	    $table->primary(['id_alloggio', 'id_servizio']);
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
