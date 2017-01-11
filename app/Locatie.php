<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locatie extends Model
{
    public $timestamps = false; // Omdat de tabel geen timestamp velden heeft

    protected $table = 'Locatie'; // Handmatige aangeving welke tabel gebruikt moet worden

    protected $primaryKey = 'locatieCode';

    protected $fillable = ['locatie'];

    public function voorraad() {
        return $this->hasMany('App\Voorraad', 'locatieCode', 'locatieCode');
    }

    // Functie om de totale inkoop waarde van deze locatie te berekenen
    public function berekenInkoopWaarde() {
        $totaal = 0;

        foreach($this->voorraad as $voorraadRegel) {
            $totaal += $voorraadRegel->berekenInkoopWaarde();
        }

        return $totaal;
    }

    // Functie om de totale verkoop waarde van deze locatie te berekenen
    public function berekenVerkoopWaarde() {
        $totaal = 0;

        foreach($this->voorraad as $voorraadRegel) {
            $totaal += $voorraadRegel->berekenVerkoopWaarde();
        }

        return $totaal;
    }
}
