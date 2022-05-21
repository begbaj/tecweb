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
		$table->string('titolo', 50);
		$table->string('descrizione', 3000);
		$table->integer('eta_min');
		$table->integer('eta_max');
		$table->string('sesso', 20);
		$table->float('prezzo');
		$table->integer('superficie');
		$table->dateTime('data_min');
		$table->dateTime('data_max');
		$table->string('tipo');
		$table->string('provincia', 50);
		$table->string('citta', 50);
		$table->string('indirizzo', 100);
		$table->string('cap', 6);
		$table->integer('posti_letto');
		$table->integer('camere');
		$table->timestamps();
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
