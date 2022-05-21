<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessaggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggi', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('destinatario')->unsigned();
            $table->bigInteger('mittente')->unsigned();
            $table->string('testo');
	    $table->timestamps();
		
	    $table->foreign('destinatario')->references('utenti')->on('id');
	    $table->foreign('mittente')->references('utenti')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggi');
    }
}
