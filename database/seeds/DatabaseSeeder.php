<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

        for ($i = 0; $i < 1000; $i++) { 
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

        // $this->call(UsersTableSeeder::class);
	
	for ($i = 0; $i < 100; $i++) { 
            try {    

		//$locatori = User::all()->pluck('id')->toArray();
		//$locatari = User::all()->pluck('id')->toArray();
		
                DB::table('faq')->insert(
                    [[
                        'domanda' => $faker->text,
                        'risposta' => $faker->text,
                        'created_at' => $faker->dateTime
                    ]]
		);

		db::table('servizi')->insert(
                    [[
                        'nome' => $faker->text,
                        'icona' => $faker->text,
                        'tipo' => $faker->text,
                        'created_at' => $faker->dateTime
                    ]]
		);

		DB::table('alloggi')->insert(
                    [[
                        'titolo' => $faker->text,
                        'descrizione' => $faker->text,
                        'eta_min' => $faker->numberBetween(20,40),
                        'eta_max' => $faker->numberBetween(20,40),
                        'prezzo' => $faker->randomFloat,
                        'genere' => $faker->randomElement(['m','f','b']),
                        'superficie' => $faker->numberBetween(10,1000),
                        'opzionato' => $faker->boolean, //dovrei mette false
                        'data_min' => $faker->date,
                        'data_max' => $faker->date,
                        'tipo' => $faker->randomElement(['appartamento','posto_letto']),
                        'provincia' => $faker->city,
                        'citta' => $faker->city,
                        'indirizzo' => $faker->address,
                        'cap' => $faker->postcode,
                        'posti_letto' => $faker->numberBetween(1,5),
                        'camere' => $faker->dateTime,
			'id_locatore' => $faker->randomElement($locatori),
                        'created_at' => $faker->dateTime
                    ]]
            	);

            } catch (Exception $e) {
            }
        }

	for ($i = 0; $i < 100; $i++) { 
            try {    

		//$alloggi = User::all()->pluck('id')->toArray();
		//$servizi = User::all()->pluck('id')->toArray();
		
                DB::table('inclusioni')->insert(
                    [[
                        'id_alloggio' => $faker->randomElement($alloggi),
                        'id_servizio' => $faker->randomElement($servizi),
                        'created_at' => $faker->dateTime
                    ]]
		);

		DB::table('messaggi')->insert(
                    [[
			'id_mittente' => $faker->randomElement($locatari),
			'id_destinatario' => $faker->randomElement($locatori),
			'testo' => $faker->text,
			'created_at' => $faker->dateTime
                    ]]
            	);

            } catch (Exception $e) {
            }
        }
 
	for ($i = 0; $i < 50; $i++) { 
            try {    

		//$alloggi = User::all()->pluck('id')->toArray();
		
		DB::table('messaggi')->insert(
                    [[
			'id_mittente' => $faker->randomElement($locatari),
			'id_destinatario' => $faker->randomElement($locatori),
			'testo' => $faker->text,
			'id_alloggio' => $faker->randomElement($alloggi),
			'created_at' => $faker->dateTime,
                    ]]
            	);

            } catch (Exception $e) {
            }
        }
    }
}
