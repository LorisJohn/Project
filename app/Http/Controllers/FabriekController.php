<?php

namespace App\Http\Controllers;

use App\Fabriek;

use App\Http\Requests;

class FabriekController extends Controller
{
    // Geeft de lijst met alle fabrieken weer
    public function index() {
        return view('fabriek.list', ['fabrieken' => Fabriek::all()]);
    }
}
