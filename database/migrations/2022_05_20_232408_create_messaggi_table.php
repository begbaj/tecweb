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
            $table->bigInteger('id_mittente')->unsigned();
            $table->bigInteger('id_destinatario')->unsigned();
            $table->string('testo', 5000);
	    $table->dateTime('timestamp');
            $table->bigInteger('id_alloggio')->unsigned()->nullable();
	    $table->dateTime('data_conferma_opzione')->nullable();
	    $table->timestamps();

	    $table->unique(['id_destinario', 'id_mittente', 'id alloggio']);

	    $table->foreign('id_destinatario')->references('utenti')->on('id');
	    $table->foreign('id_mittente')->references('utenti')->on('id');
	    $table->foreign('id_alloggio')->references('alloggi')->on('id');
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
