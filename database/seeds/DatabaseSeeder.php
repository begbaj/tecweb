<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Servizio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
        
    
    public function run()
    {
        
        $array_messaggi = ['Salve', 'La sua proposta è interessante', 'La contatterò più tardi', 'Buona Sera!', 'Come va?'];
        $array_titolo_alloggi = ['Alloggio Bello', 'Alloggio incredibile', 'Alloggio con Vista Mozzafiato', 'Letto Comodo', 'Vista mare', 'Alloggio Confortevole',
             'Alloggio Spazioso', 'Alloggio Areato', 'Alloggio Colorato', 'Letto Morbido', 'Lenzuola Profumate','Cuscino che sprofonda','Materasso in memory'];
        $faker = Faker::create('it_IT');
	
	/*try {
		for ($i = 0; $i < 100; $i++) { 

			echo "Inserting user " . $i ."\n";
			DB::table('users')->insert(
			    [[
				'nome' => $faker->firstName,
				'cognome' => $faker->lastName,
				'data_nascita' => $faker->date,
				'genere' => $faker->randomElement(['m','f','b']),
				'username' => $faker->unique()->userName,
				'password' => Hash::make($faker->password),
				'ruolo' => $faker->randomElement(['locatore','locatario']),
				'created_at' => $faker->dateTime
			    ]]
		    );
		}
    */	
            echo "Inserting users";
            DB::table('users')->insert([
                ['id' => '1', 'nome' => 'Locatore', 'cognome' => 'Di Prova', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere'=>'m', 'username' => 'lorelore', 
                    'password' => Hash::make('Niphwpog'), 'ruolo' => 'locatore','created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '2','nome' => 'Locatario', 'cognome' => 'Di Prova', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'f', 'username' => 'lariolario',
                    'password' => Hash::make('Niphwpog'), 'ruolo' => 'locatario', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '3','nome' => 'Admin', 'cognome' => 'Di Prova', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'b', 'username' => 'adminadmin',
                    'password' => Hash::make('Niphwpog'), 'ruolo' => 'admin', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '4', 'nome' => 'Rahmi', 'cognome' => 'El Mechri', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere'=>'m', 'username' => 'elmechri', 
                    'password' => Hash::make('rahmi00elmechri'), 'ruolo' => 'locatario','created_at' => date("2022-06-06"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '5','nome' => 'Began', 'cognome' => 'Bajrami', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'm', 'username' => 'begbaj00',
                    'password' => Hash::make('begbajbegan'), 'ruolo' => 'locatario', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '6','nome' => 'Chiara', 'cognome' => 'Gobbi', 'data_nascita' => date("2001/01/18"), 'genere' => 'f', 'username' => 'chiaragobbi01',
                    'password' => Hash::make('chiaragobbi01'), 'ruolo' => 'locatore', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '7','nome' => 'Alessio', 'cognome' => 'Giacconi', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'm', 'username' => 'gimmifallo',
                    'password' => Hash::make('alegiacconi'), 'ruolo' => 'locatario', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '8','nome' => 'Mario', 'cognome' => 'Rossi', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'b', 'username' => 'mariomario',
                    'password' => Hash::make('ciaociaociao'), 'ruolo' => 'locatore', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '9','nome' => 'Edoardo', 'cognome' => 'Verdi', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'b', 'username' => 'verdiverdi',
                    'password' => Hash::make('prova12345'), 'ruolo' => 'locatario', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
                ['id' => '10','nome' => 'Luca', 'cognome' => 'Azzurri', 'data_nascita' => $faker->dateTimeBetween('-50 years', '-18 years'), 'genere' => 'b', 'username' => 'lucaluca00',
                    'password' => Hash::make('lucalucaluca'), 'ruolo' => 'locatore', 'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")]                
		]);            
   	/*} catch (Exception $e) {
	    echo 'Message: ' .$e->getMessage();
    	}*/

        // $this->call(UsersTableSeeder::class);

        $servs =
            [ 
                'appartamento' => [ 'cucina', 'locale_ricreativo', 'angolo_studio', 'garage'],
                'posto_letto' => ['servizio_in_camera'],
                'null' => ['box_doccia', 'condizionatore', 'asciugatrice', 'area_fumatori', 'palestra',
                'vasca', 'wifi', 'lavatrice', 'riscaldamento', 'tv', 'vicino_palestra',
                'vicino_facolta', 'vicino_supermercato', 'vicino_fermata_metro', 'vicino_centro',
                'vicino_stazione', 'vicino_mensa', 'vicino_fermata_bus']
            ];
        $i = 0;
        $keys = array_keys($servs);
	echo "Inserting default services";
        foreach ($servs as $tipo) {
           foreach ($tipo as $serv) {       
                DB::table('servizi')->insert( [[
                        'nome' => $serv,
                        'tipo' => $keys[$i] == 'null' ? null : $keys[$i],
                        'created_at' => $faker->dateTime
                    ]]
                );
           } 
            $i++;
        }


        DB::table('faq')->insert([
            ['domanda' => 'Dove posso trovare i contatti del Kumuuzag master?', 'risposta' => 'Nella navbar della HomePage.', 'created_at' => $faker->date],
            ['domanda' => 'Come faccio ad inserire un alloggio?', 'risposta' => 'Diventa Locatore.', 'created_at' => $faker->date],
            ['domanda' => 'Posso opzionare un alloggio se non sono loggato?', 'risposta' => 'No, prova a registrarti come locatario.', 'created_at' => $faker->date],
            ['domanda' => 'Posso contattare un locatore?', 'risposta' => 'Sì, tramite la messaggistica interna al sito.', 'created_at' => $faker->date],
            ['domanda' => 'Cosa significa Kumuuzag?', 'risposta' => 'Vendilo in Swahili.', 'created_at' => $faker->date],		
            ['domanda' => 'E perchè questo nome?', 'risposta' => 'Suona esotico!', 'created_at' => $faker->date],		
            ]);


	$locatori = User::where('ruolo','=', 'locatore')->pluck('id')->toArray();
	$locatari = User::where('ruolo','=', 'locatario')->pluck('id')->toArray();

	/*for ($i = 0; $i < 1000; $i++) { 
            try {    
		echo "Inserting alloggio " . $i ."\n";
		$date_start = $faker->dateTimeBetween('2022-01-01','2022-12-31');
		$date_end = $faker->dateTimeBetween($date_start, '2023-12-31');
                DB::table('alloggi')->insert(
                    [[
                        'titolo' => $faker->randomElement($array_titolo_alloggi),
                        'descrizione' => $faker->randomElement($array_titolo_alloggi),
                        'eta_min' => $faker->numberBetween(20,40),
                        'eta_max' => $faker->numberBetween(41,60),
                        'prezzo' => $faker->randomFloat(2, 100, 600),
                        'sesso' => $faker->randomelement(['m','f','b']),
                        'superficie' => $faker->numberBetween(10,1000),
                        'confermato' => $faker->boolean,
                        'data_min' => $date_start,
                        'data_max' => $date_end,
                        'tipo' => $faker->randomElement(['appartamento','posto_letto']),
                        'provincia' => $faker->city,
                        'citta' => $faker->city,
                        'indirizzo' => $faker->streetAddress,
                        'cap' => $faker->postcode,
                        'posti_letto' => $faker->numberBetween(1,5),
                        'camere' => $faker->numberBetween(1,5),
                        'id_locatore' => $faker->randomElement($locatori),
                        'created_at' => $faker->dateTimeBetween('2021-01-01', $date_start)
                    ]]
                );

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }*/
        
        DB::table('alloggi')->insert([
            ['id' => '1', 'titolo' => 'Alloggio Incredibile', 'descrizione' => 'Questo alloggio contiene delle stanze molto spazionse e letti molto confortevoli, è inoltre presente area fumatori',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 140.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-05"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2020-05-06")],
            ['id' => '2','titolo' => 'Alloggio Fantastico', 'descrizione' => 'Se vuoi avere un posto tranquillo dove studiare questo alloggio fa veramente al caso tuo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 200.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 1, 'data_min' => date("2021-05-05"), 'data_max' => date("2026-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-07")],            
            ['id' => '3','titolo' => 'Alloggio Rosa', 'descrizione' => 'Questo alloggio ha delle stanze veramente spaziose e confortevoli',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 300.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2020-05-05"), 'data_max' => date("2024-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Torino', 'citta' => 'Torino', 'indirizzo' => 'via Rossa, 56', 'CAP' => 49393, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 5,
                'created_at' => date("2021-05-08")],
            ['id' => '4','titolo' => 'Alloggio Spazioso', 'descrizione' => 'Questo alloggio è un paradiso per gli studenti, devi assolutamente opzionarlo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 50.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 1, 'data_min' => date("2022-05-07"), 'data_max' => date("2022-05-09"), 
                'tipo' => 'posto_letto', 'provincia' => 'Torino', 'citta' => 'Milano', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 70492, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2022-05-05")],
            ['id' => '5','titolo' => 'Alloggio Stupendo', 'descrizione' => 'Questo alloggio rispetta proprio la vita di uno studente, è veramente incantevole',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 667.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 1, 'data_min' => date("2022-05-09"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'posto_letto', 'provincia' => 'Roma', 'citta' => 'Roma', 'indirizzo' => 'via Flavia, 22', 'CAP' => 50330, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-05")],            
            ['id' => '6', 'titolo' => 'Alloggio Incredibile', 'descrizione' => 'Questo alloggio contiene delle stanze molto spazionse e letti molto confortevoli, è inoltre presente area fumatori',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 140.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-05"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2020-05-06")],
            ['id' => '7','titolo' => 'Alloggio Fantastico', 'descrizione' => 'Se vuoi avere un posto tranquillo dove studiare questo alloggio fa veramente al caso tuo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 200.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2021-05-05"), 'data_max' => date("2026-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-07")],            
            ['id' => '8','titolo' => 'Alloggio Rosa', 'descrizione' => 'Questo alloggio ha delle stanze veramente spaziose e confortevoli',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 300.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2020-05-05"), 'data_max' => date("2024-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Torino', 'citta' => 'Torino', 'indirizzo' => 'via Rossa, 56', 'CAP' => 49393, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 5,
                'created_at' => date("2021-05-08")],
            ['id' => '9','titolo' => 'Alloggio Spazioso', 'descrizione' => 'Questo alloggio è un paradiso per gli studenti, devi assolutamente opzionarlo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 50.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-07"), 'data_max' => date("2022-05-09"), 
                'tipo' => 'posto_letto', 'provincia' => 'Torino', 'citta' => 'Milano', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 70492, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2022-05-05")],
            ['id' => '10','titolo' => 'Alloggio Stupendo', 'descrizione' => 'Questo alloggio rispetta proprio la vita di uno studente, è veramente incantevole',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 667.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-09"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'posto_letto', 'provincia' => 'Roma', 'citta' => 'Roma', 'indirizzo' => 'via Flavia, 22', 'CAP' => 50330, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-05")],            
            ['id' => '11','titolo' => 'Alloggio Stupendo', 'descrizione' => 'Questo alloggio rispetta proprio la vita di uno studente, è veramente incantevole',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 667.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-09"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'posto_letto', 'provincia' => 'Roma', 'citta' => 'Roma', 'indirizzo' => 'via Flavia, 22', 'CAP' => 50330, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-05")],            
            ['id' => '12', 'titolo' => 'Alloggio Incredibile', 'descrizione' => 'Questo alloggio contiene delle stanze molto spazionse e letti molto confortevoli, è inoltre presente area fumatori',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 140.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-05"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2020-05-06")],
            ['id' => '13','titolo' => 'Alloggio Fantastico', 'descrizione' => 'Se vuoi avere un posto tranquillo dove studiare questo alloggio fa veramente al caso tuo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 200.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2021-05-05"), 'data_max' => date("2026-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Ancona', 'citta' => 'Ancona', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 60130, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-07")],            
            ['id' => '14','titolo' => 'Alloggio Rosa', 'descrizione' => 'Questo alloggio ha delle stanze veramente spaziose e confortevoli',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 300.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2020-05-05"), 'data_max' => date("2024-05-05"), 
                'tipo' => 'appartamento', 'provincia' => 'Torino', 'citta' => 'Torino', 'indirizzo' => 'via Rossa, 56', 'CAP' => 49393, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 5,
                'created_at' => date("2021-05-08")],
            ['id' => '15','titolo' => 'Alloggio Spazioso', 'descrizione' => 'Questo alloggio è un paradiso per gli studenti, devi assolutamente opzionarlo!',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 50.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-07"), 'data_max' => date("2022-05-09"), 
                'tipo' => 'posto_letto', 'provincia' => 'Torino', 'citta' => 'Milano', 'indirizzo' => 'via Breccie Bianche, 22', 'CAP' => 70492, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 6,
                'created_at' => date("2022-05-05")],
            ['id' => '16','titolo' => 'Alloggio Stupendo', 'descrizione' => 'Questo alloggio rispetta proprio la vita di uno studente, è veramente incantevole',
                'eta_min' => 18, 'eta_max' => 25, 'prezzo' => 667.50, 'sesso' => 'm', 'superficie' => 100, 'confermato' => 0, 'data_min' => date("2022-05-09"), 'data_max' => date("2023-05-05"), 
                'tipo' => 'posto_letto', 'provincia' => 'Roma', 'citta' => 'Roma', 'indirizzo' => 'via Flavia, 22', 'CAP' => 50330, 'posti_letto' => 5, 'camere' => 4, 'id_locatore' => 1,
                'created_at' => date("2022-05-05")],            
            ]);    
        
        DB::table('inclusioni')->insert([
            ['id_alloggio'=>'1', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'1', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'1', 'id_servizio'=>'3', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'1', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'1', 'id_servizio'=>'9', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'1', 'id_servizio'=>'11', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'2', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'2', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'2', 'id_servizio'=>'17', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'2', 'id_servizio'=>'19', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'3', 'id_servizio'=>'23', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'3', 'id_servizio'=>'22', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'4', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'4', 'id_servizio'=>'7', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'4', 'id_servizio'=>'5', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'5', 'id_servizio'=>'12', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'5', 'id_servizio'=>'14', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'3', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'9', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'6', 'id_servizio'=>'11', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'7', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'7', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'7', 'id_servizio'=>'17', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'7', 'id_servizio'=>'19', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'8', 'id_servizio'=>'23', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'8', 'id_servizio'=>'22', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'9', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'9', 'id_servizio'=>'7', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'9', 'id_servizio'=>'5', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'10', 'id_servizio'=>'12', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'10', 'id_servizio'=>'14', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'11', 'id_servizio'=>'12', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'11', 'id_servizio'=>'14', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'3', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'9', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'12', 'id_servizio'=>'11', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'13', 'id_servizio'=>'1', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'13', 'id_servizio'=>'2', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'13', 'id_servizio'=>'17', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'13', 'id_servizio'=>'19', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'14', 'id_servizio'=>'23', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'14', 'id_servizio'=>'22', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'15', 'id_servizio'=>'8', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'15', 'id_servizio'=>'7', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'15', 'id_servizio'=>'5', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'16', 'id_servizio'=>'12', 'created_at' => date("2022-05-05")],
            ['id_alloggio'=>'16', 'id_servizio'=>'14', 'created_at' => date("2022-05-05")],
            
        ]);
	
         
        DB::table('messaggi')->insert([
            ['id_mittente'=>'2', 'id_destinatario'=>'1', 'testo' => 'Salve, sono Locatario Di Prova e vorrei affittare il tuo alloggio.', 'id_alloggio' => 2 , 'data_conferma_opzione' => date("2022-05-05 19:00:00"),'created_at' => date("2022-05-05 14:00:00")],
            ['id_mittente'=>'1', 'id_destinatario'=>'2', 'testo' => "La tua richiesta per l'alloggio 2 e' stata accettata, vai sulla pagina dei dettagli per scaricare il contratto.", 'id_alloggio' => NULL , 'data_conferma_opzione' => NULL,'created_at' => date("2022-05-05 19:00:00")],
            ['id_mittente'=>'5', 'id_destinatario'=>'6', 'testo' => 'Salve, mi può fare uno sconto?', 'id_alloggio' => NULL, 'data_conferma_opzione' => NULL,'created_at' => date("2022-05-05")],
            ['id_mittente'=>'6', 'id_destinatario'=>'5', 'testo' => 'Salve, no', 'id_alloggio' => NULL, 'data_conferma_opzione' => NULL,'created_at' => date("2022-05-06")],
            ['id_mittente'=>'6', 'id_destinatario'=>'5', 'testo' => 'Vorrei affittare questo alloggio, buona giornata', 'id_alloggio' => 3, 'data_conferma_opzione' => date("2022-05-05 18:14:22"),'created_at' => date("2022-05-05 9:30:30")],
            ['id_mittente'=>'5', 'id_destinatario'=>'6', 'testo' => "La tua richiesta per l'alloggio 3 e' stata accettata, vai sulla pagina dei dettagli per scaricare il contratto.", 'id_alloggio' => NULL, 'data_conferma_opzione' => NULL,'created_at' => date("2022-05-05 18:14:22")],
        ]);       
/*
	$alloggi = Alloggio::all()->pluck('id')->toArray();
	$servizi = Servizio::all()->pluck('id')->toArray();
	
	for ($i = 0; $i < 5000; $i++) { 
            try {    
		
		echo "Inserting inclusion " . $i ."\n";
                DB::table('inclusioni')->insert(
                    [[
                        'id_alloggio' => $faker->randomElement($alloggi),
                        'id_servizio' => $faker->randomElement($servizi),
                        'created_at' => $faker->dateTime
                    ]]
		);

		echo "Inserting message " . $i ."\n";
		DB::table('messaggi')->insert(
                    [[
			'id_mittente' => $faker->randomElement($locatari),
			'id_destinatario' => $faker->randomElement($locatori),
			'testo' => $faker->randomElement($array_messaggi),
			'created_at' => $faker->dateTime
                    ]]
            	);

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }
 	$alloggi_opzionati=Alloggio::where('confermato', '=', true)->pluck('id')->toArray(); echo "Inserting options for relational constraint purposes";
	foreach($alloggi_opzionati as $alloggio) { 
            try {    
		DB::table('messaggi')->insert(
                    [[
			'id_mittente' => $faker->randomElement($locatari),
			'id_destinatario' => $faker->randomElement($locatori),
			'testo' => $faker->randomElement($array_messaggi),
			'id_alloggio' => $alloggio,
			'data_conferma_opzione' => $faker->dateTime,
			'created_at' => $faker->dateTime,
                    ]]
            	);

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }
 */
    }
}
