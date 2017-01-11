<?php

namespace App\Http\Controllers;

use App\Medewerker;

use App\Http\Requests;

class MedewerkerController extends Controller
{
    // Geeft de lijst van medewerkers weer
    public function index() {
        return view('medewerker.list', ['medewerkers' => Medewerker::all()]);
    }
}
