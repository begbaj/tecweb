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
    }
}
