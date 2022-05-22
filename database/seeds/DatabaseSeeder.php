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
    }
}
