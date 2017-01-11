<?php

use Illuminate\Database\Seeder;

use App\Medewerker;

class MedewerkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Medewerker M.B. Jones
        Medewerker::create([
            'voorletters' => 'M.B.',
            'achternaam' => 'Jones',
            'gebruikersnaam' => 'm.jones',
            'wachtwoord' => Hash::make('Pass1')
        ]);

        // Medewerker J.W. Heyman
        Medewerker::create([
            'voorletters' => 'J.W.',
            'achternaam' => 'Heyman',
            'gebruikersnaam' => 'j.heyman',
            'wachtwoord' => Hash::make('Pass2')
        ]);
    }
}
