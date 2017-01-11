<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Voorraad extends Model
{
    public $timestamps = false; // Omdat de tabel geen timestamp velden heeft

    protected $table = 'Voorraad'; // Handmatige aangeving welke tabel gebruikt moet worden

    protected $fillable = ['locatieCode', 'productCode', 'aantal'];

    // Artikel relatie
    public function artikel() {
        return $this->belongsTo('App\Artikel', 'productCode', 'productCode');
    }

    // Locatie relatie
    public function locatie() {
        return $this->belongsTo('App\Locatie', 'locatieCode', 'locatieCode');
    }

    // Functie om de totale inkoop waarde van deze voorraad regel te berekenen
    public function berekenInkoopWaarde() {
        //var_dump(['aantal'=>$this->aantal, 'waarde'=>$this->artikel->verkoopprijs]);
        return $this->aantal * $this->artikel->inkoopprijs;
    }

    // Functie om de totale verkoop waarde van deze voorraad regel te berekenen
    public function berekenVerkoopWaarde() {
        return $this->aantal * $this->artikel->verkoopprijs;
    }


    /**
     * Set the keys for a save update query.
     * This is a fix for tables with composite keys
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            //Put appropriate values for your keys here:
            ->where('locatieCode', '=', $this->locatieCode)
            ->where('productCode', '=', $this->productCode);

        return $query;
    }
}
