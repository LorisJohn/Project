<?php

namespace App\Http\Controllers;

use App\Artikel;

use App\Http\Requests;

class ArtikelController extends Controller
{
    // Geeft de lijst met alle artikelen weer
    public function index() {
        return view('artikel.list', ['artikelen' => Artikel::with('fabriek')->get()]);
    }
}
