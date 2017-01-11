<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Medewerker extends Authenticatable
{
    public $timestamps = false; // Omdat de tabel geen timestamp velden heeft

    protected $table = 'Medewerker'; // Handmatige aangeving welke tabel gebruikt moet worden

    protected $primaryKey = 'medewerkersCode'; // Normaal gaat laravel er van uit dat dit veld 'id' heet
}
