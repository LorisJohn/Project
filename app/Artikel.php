<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public $timestamps = false; // Omdat de tabel geen timestamp velden heeft

    protected $table = 'Artikel'; // Handmatige aangeving welke tabel gebruikt moet worden

    protected $primaryKey = 'productCode';

    // Fabriek relatie
    public function fabriek() {
        return $this->belongsTo('App\Fabriek', 'fabrieksCode', 'fabrieksCode');
    }

    // Voorraad relatie
    public function voorraad() {
        return $this->hasMany('App\Voorraad', 'productCode', 'productCode');
    }
}
