<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabriek extends Model
{
    public $timestamps = false; // Omdat de tabel geen timestamp velden heeft

    protected $table = 'Fabriek'; // Handmatige aangeving welke tabel gebruikt moet worden

    protected $primaryKey = 'fabrieksCode';

    // Artikel relatie
    public function artikelen() {
        return $this->hasMany('App\Artikel', 'fabrieksCode', 'fabrieksCode');
    }
}
