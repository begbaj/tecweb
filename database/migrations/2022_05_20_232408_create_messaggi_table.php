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
            $table->unsignedBigInteger('id_mittente');
            $table->unsignedBigInteger('id_destinatario');
            $table->string('testo', 5000);
            $table->unsignedBigInteger('id_alloggio')->nullable();
	    $table->dateTime('data_conferma_opzione')->nullable();
	    $table->timestamps();

	    $table->unique(['id_destinatario', 'id_mittente', 'id_alloggio']);

	    $table->foreign('id_destinatario')->references('id')->on('users');
	    $table->foreign('id_mittente')->references('id')->on('users');
	    $table->foreign('id_alloggio')->references('id')->on('alloggi')->onDelete('set null');
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
