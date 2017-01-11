<?php

use Illuminate\Database\Seeder;

use App\Artikel;
use App\Fabriek;
use App\Locatie;
use App\Voorraad;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // zet de foreign keys tijdelijk uit

        // Haal alle oude data weg
        Artikel::truncate();
        Fabriek::truncate();
        Locatie::truncate();
        Voorraad::truncate();
        App\Medewerker::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // en zet foreign keys weer aan

        // Ik doe de invulling van de Artikel, Fabriek, Locatie en Voorraad gegevens hier omdat de gegenereede id's gebruikt worden voor de relaties

        // maak de fabrieken en sla ze de fabrieksCodes op in variablen
        $worx = Fabriek::create([
            'fabriek' => 'Worx',
            'telefoon' => '010-223232'
        ])->fabrieksCode;

        $bosh = Fabriek::create([
            'fabriek' => 'Bosh',
            'telefoon' => '010-203234'
        ])->fabrieksCode;

        // maak de artikelen en sla de productCodes op in variablen
        $workmate = Artikel::create([
            'product' => 'Workmate',
            'type' => 'WM 546',
            'fabrieksCode' => $bosh,
            'inkoopprijs' => 45.95,
            'verkoopprijs' => 99.95
        ])->productCode;

        $boormachine = Artikel::create([
            'product' => 'Boormachine',
            'type' => 'BM 323',
            'fabrieksCode' => $worx,
            'inkoopprijs' => 99.95,
            'verkoopprijs' => 179.99
        ])->productCode;

        $boormachine2 = Artikel::create([
            'product' => 'Boormachine',
            'type' => 'DE 232',
            'fabrieksCode' => $bosh,
            'inkoopprijs' => 199.95,
            'verkoopprijs' => 299.95
        ])->productCode;


        // maak de locaties en sla ze op in variablen
        $rotterdam = Locatie::create([
            'locatie' => 'Rotterdam'
        ])->locatieCode;

        $almere = Locatie::create([
            'locatie' => 'Almere'
        ])->locatieCode;


        // Rotterdam voorraad
        Voorraad::create([
            'locatieCode' => $rotterdam,
            'productCode' => $boormachine,
            'aantal' => 10
        ]);

        // Almere voorraad
        Voorraad::create([
            'locatieCode' => $almere,
            'productCode' => $workmate,
            'aantal' => 32
        ]);

        $this->call(MedewerkerSeeder::class);
    }
}
