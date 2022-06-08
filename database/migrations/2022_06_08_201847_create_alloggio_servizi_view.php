<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAlloggioServiziView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS alloggio_servizi_view;');
        DB::statement("
            CREATE VIEW alloggio_servizi_view
            AS
            SELECT
                alloggi.*,
                GROUP_CONCAT(DISTINCT servizi.id ) id_servizi,
                GROUP_CONCAT(DISTINCT servizi.nome ) servizi
            FROM
                `alloggi`
            INNER JOIN `inclusioni` ON `alloggi`.`id` = `inclusioni`.`id_alloggio`
            INNER JOIN `servizi` ON `servizi`.`id` = `inclusioni`.`id_servizio`
            GROUP BY
                alloggi.id,
                alloggi.id_locatore,
                alloggi.titolo,
                alloggi.descrizione,
                alloggi.eta_min,
                alloggi.eta_max,
                alloggi.sesso,
                alloggi.prezzo,
                alloggi.superficie,
                alloggi.data_min,
                alloggi.data_max,
                alloggi.tipo,
                alloggi.provincia,
                alloggi.citta,
                alloggi.indirizzo,
                alloggi.cap,
                alloggi.posti_letto,
                alloggi.camere,
                alloggi.confermato,
                alloggi.created_at,
                alloggi.updated_at;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS alloggio_servizi_view;');
    }
}
