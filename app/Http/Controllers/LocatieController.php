<?php

namespace App\Http\Controllers;

use App\Locatie;
use Illuminate\Http\Request;

class LocatieController extends Controller
{
    // Toon een lijst met alle locaties
    public function index() {
        $locaties = Locatie::with('voorraad.artikel')->get();
        return view('locatie.list', ['locaties' => $locaties]);
    }

    // Toont de pagina om een locatie toe te voegen
    public function toevoegen() {
        return view('locatie.create');
    }

    // De functie die via een PUT request de locatie toevoegd
    public function toevoegenPut(Request $request) {
        $this->validate($request, [
            'locatie' => 'required|string',
        ]);
        Locatie::create($request->only(['locatie']));

        return redirect()->action("LocatieController@index");
    }
}
