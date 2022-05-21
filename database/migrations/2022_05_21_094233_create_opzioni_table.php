<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpzioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opzioni', function (Blueprint $table) {
            $table->bigIncrements('id');
	    $table->bigInteger('id_locatore')->unsigned();
	    $table->bigInteger('id_locatario')->unsigned();
	    $table->bigInteger('id_alloggio')->unsigned();
	    $table->timestamp('timestamp_messaggio');
            $table->timestamps();
	    
	    $table->foreign('id_locatore')->references('destinatario')->on('messaggi');
	    $table->foreign('id_locatario')->references('mittente')->on('messaggi');
	    $table->foreign('timestamp_messaggio')->references('created_at')->on('messaggi');
	    $table->foreign('id_alloggio')->references('id')->on('alloggi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opzioni');
    }
}
