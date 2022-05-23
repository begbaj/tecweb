<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlloggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alloggi', function (Blueprint $table) {
		$table->bigIncrements('id')->index();
		$table->unsignedbigInteger('id_locatore');
		$table->string('titolo', 50);
		$table->string('descrizione', 3000);
		$table->integer('eta_min')->nullable();
		$table->integer('eta_max')->nullable();
		$table->string('sesso', 20)->nullable();
		$table->float('prezzo');
		$table->integer('superficie');
		$table->dateTime('data_min');
		$table->dateTime('data_max');
		$table->string('tipo');
		$table->string('provincia', 50);
		$table->string('citta', 50);
		$table->string('indirizzo', 100);
		$table->string('cap', 5);
		$table->integer('posti_letto');
		$table->integer('camere');
		$table->timestamps();
		
		$table->foreign('id_locatore')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alloggi');
    }
}
