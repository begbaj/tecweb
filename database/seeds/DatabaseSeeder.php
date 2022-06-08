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
        $faker = Faker::create('it_IT');
	
	try {
		for ($i = 0; $i < 1000; $i++) { 

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
        	
		echo "Inserting default users";
		DB::table('users')->insert([
		    ['nome' => 'Locatore', 'cognome' => 'Di Prova', 'data_nascita' => $faker->date, 'genere'=>'m', 'username' => 'lorelore', 
			'password' => Hash::make('Niphwpog'), 'ruolo' => 'locatore','created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")],
		    ['nome' => 'Locatario', 'cognome' => 'Di Prova', 'data_nascita' => $faker->date, 'genere' => 'f', 'username' => 'lariolario',
			'password' => Hash::make('Niphwpog'), 'ruolo' => 'locatario', 'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")],
		    ['nome' => 'Admin', 'cognome' => 'Di Prova', 'data_nascita' => $faker->date, 'genere' => 'b', 'username' => 'adminadmin',
			'password' => Hash::make('Niphwpog'), 'ruolo' => 'admin', 'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")]
		]);
   	} catch (Exception $e) {
	    echo 'Message: ' .$e->getMessage();
    	}

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
                        'icona' => $faker->word,
                        'tipo' => $keys[$i] == 'null' ? null : $keys[$i],
                        'created_at' => $faker->dateTime
                    ]]
                );
           } 
            $i++;
        }

	for ($i = 0; $i < 15; $i++) { 
            try {    
		echo "Inserting faq " . $i ."\n";
                DB::table('faq')->insert(
                    [[
                        'domanda' => $faker->text(100),
                        'risposta' => $faker->text(100),
                        'created_at' => $faker->dateTime,
			//'ordine' => $i
                    ]]
		);
            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
	}

	$locatori = User::where('ruolo','=', 'locatore')->pluck('id')->toArray();
	$locatari = User::where('ruolo','=', 'locatario')->pluck('id')->toArray();

	for ($i = 0; $i < 300; $i++) { 
            try {    
		echo "Inserting alloggio " . $i ."\n";
		DB::table('alloggi')->insert(
                    [[
                        'titolo' => $faker->sentence($nbWords=5),
                        'descrizione' => $faker->text(300),
                        'eta_min' => $faker->numberBetween(20,40),
                        'eta_max' => $faker->numberBetween(20,50),
                        'prezzo' => $faker->randomFloat(2, 100, 600),
                        'sesso' => $faker->randomelement(['m','f','b']),
                        'superficie' => $faker->numberBetween(10,1000),
                        'confermato' => $faker->boolean,
                        'data_min' => $faker->date,
                        'data_max' => $faker->date,
                        'tipo' => $faker->randomElement(['appartamento','posto_letto']),
                        'provincia' => $faker->city,
                        'citta' => $faker->city,
                        'indirizzo' => $faker->address,
                        'cap' => $faker->postcode,
                        'posti_letto' => $faker->numberBetween(1,5),
                        'camere' => $faker->numberBetween(1,5),
			'id_locatore' => $faker->randomElement($locatori),
                        'created_at' => $faker->dateTime
                    ]]
		);

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }
	

	$alloggi = Alloggio::all()->pluck('id')->toArray();
	$servizi = Servizio::all()->pluck('id')->toArray();
	
	for ($i = 0; $i < 100; $i++) { 
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
			'testo' => $faker->sentence($nbWords=10),
			'created_at' => $faker->dateTime
                    ]]
            	);

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }
 	
	$alloggi_opzionati=Alloggio::where('confermato', '=', true)->pluck('id')->toArray();

	echo "Inserting options for relational constraint purposes";
	foreach($alloggi_opzionati as $alloggio) { 
            try {    
		DB::table('messaggi')->insert(
                    [[
			'id_mittente' => $faker->randomElement($locatari),
			'id_destinatario' => $faker->randomElement($locatori),
			'testo' => $faker->sentence($nbWords=10),
			'id_alloggio' => $alloggio,
			'data_conferma_opzione' => $faker->dateTime,
			'created_at' => $faker->dateTime,
                    ]]
            	);

            } catch (Exception $e) {
		    echo 'Message: ' .$e->getMessage();
            }
        }
    }
}
