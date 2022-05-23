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
            try {    
                DB::table('users')->insert(
                    [[
                        'nome' => $faker->firstName,
                        'cognome' => $faker->lastName,
                        'data_nascita' => $faker->date,
                        'genere' => $faker->randomElement(['m','f','b']),
                        'username' => $faker->userName,
                        'password' => $faker->password,
                        'ruolo' => $faker->randomElement(['locatore','locatario']),
                        'created_at' => $faker->dateTime
                    ]]
            );
            } catch (Exception $e) {
            }
        }

        // $this->call(UsersTableSeeder::class);
	
	for ($i = 0; $i < 100; $i++) { 
            try {    

		//$locatori = User::all()->pluck('id')->toArray();
		//$locatari = User::all()->pluck('id')->toArray();
		
                DB::table('faq')->insert(
                    [[
                        'domanda' => $faker->text,
                        'risposta' => $faker->text
                    ]]
		);

		DB::table('alloggi')->insert(
                    [[
                        'titolo' => $faker->text,
                        'descrizione' => $faker->text,
                        'eta_min' => $faker->numberBetween(20,40),
                        'eta_max' => $faker->numberBetween(20,40),
                        'prezzo' => $faker->dateTime,
                        'genere' => $faker->randomElement(['m','f','b']),
                        'superficie' => $faker->numberBetween(10,1000),
                        'opzionato' => $faker->dateTime,
                        'data_min' => $faker->dateTime,
                        'data_max' => $faker->dateTime,
                        'tipo' => $faker->dateTime,
                        'provincia' => $faker->dateTime,
                        'citta' => $faker->city,
                        'indirizzo' => $faker->address,
                        'cap' => $faker->postcode,
                        'posti_letto' => $faker->numberBetween(1,5),
                        'camere' => $faker->dateTime,
			'id_locatore' => $faker->randomElement($locatori)
                    ]]
            	);

            } catch (Exception $e) {
            }
        }
    }
}
