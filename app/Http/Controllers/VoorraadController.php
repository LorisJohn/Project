<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Locatie;

use DB;
use App\Http\Requests;
use App\Voorraad;
use Illuminate\Http\Request;

class VoorraadController extends Controller
{
    // Geeft de voorraad van een locatie weer
    public function locatie($locatieCode = -1) {
        $locaties = Locatie::with('voorraad.artikel')->get();
        $voorraadLocatie = $locaties->find($locatieCode);

        return view('voorraad.locatie', ['locaties' => $locaties, 'locatieCode' => $locatieCode, 'voorraadLocatie' => $voorraadLocatie]);
    }

    // Zoek pagina, de POST gaat ook via deze functie
    public function zoeken(Request $request) {
        $locatieCode = $request->input('locatieCode');
        $productNaam = $request->input('productNaam');

        $locaties = Locatie::with('voorraad.artikel')->get();
        $artikelNamen = Artikel::select('product')->groupBy('product')->get();

        $voorraadLocatie = $locaties->find($locatieCode);

        $resultaten = [];

        if (is_object($voorraadLocatie)) {
            foreach ($voorraadLocatie->voorraad as $voorraadRegel) {
                if ($voorraadRegel->artikel->product == $productNaam) {
                    $resultaten[] = $voorraadRegel;
                }
            }
        }

        return view('voorraad.zoeken', ['locaties' => $locaties, 'locatieCode' => $locatieCode, 'artikelNamen' => $artikelNamen, 'productNaam' => $productNaam, 'resultaten' => $resultaten]);
    }

    // Geeft de pagina weer om artikelen te verplaatsen van locatie a naar locatie b
    public function verplaatsen($locatieCode) {
        $locaties = Locatie::with('voorraad.artikel')->get();
        $voorraadLocatie = $locaties->find($locatieCode);

        return view('voorraad.verplaatsen', ['locaties' => $locaties, 'locatieCode' => $locatieCode, 'voorraadLocatie' => $voorraadLocatie]);
    }

    // De functie die via een PATCH request de aantallen in de voorraad aanpast
    public function verplaatsenPatch(Request $request, $locatieCode) {
        $artikelen = $request->input("artikel");

        $databaseArtikelen = Artikel::all();
        $voorraadLocatie = Locatie::find($locatieCode);
        $bestemmingsLocatie = Locatie::find($request->input("bestemmingsLocatieCode"));

        foreach($artikelen as $artikel => $aantal) {
            $artikel = $databaseArtikelen->find($artikel);
            $this->aantalBijwerken($voorraadLocatie, $artikel, $aantal * -1); // -1 want je haalt het hier weg
            $this->aantalBijwerken($bestemmingsLocatie, $artikel, $aantal);
        }

        return redirect()->action("VoorraadController@locatie", ['locatieCode' => $locatieCode]);
    }

    // Bewerk pagina
    public function bewerken($locatieCode) {
        $voorraadLocatie = Locatie::find($locatieCode);
        $artikelen = Artikel::with('fabriek')->get();

        return view('voorraad.bewerken', ['locatieCode' => $locatieCode, 'voorraadLocatie' => $voorraadLocatie, 'artikelen' => $artikelen]);
    }

    // De functie die via een PATCH request de aantallen in de voorraad aanpast
    public function bewerkenPatch(Request $request, $locatieCode) {
        $actie = $request->input("actie", "0");

        if ($actie != "1" && $actie != "2") {
            return "Error: Invalide actie";
        }

        $artikelen = $request->input("artikel");

        // maak alle nummers negatief
        if ($actie == "2") {
            foreach($artikelen as $artikel => $aantal) {
                $artikelen[$artikel] = $aantal * -1;
            }
        }

        $databaseArtikelen = Artikel::all();
        $voorraadLocatie = Locatie::find($locatieCode);

        foreach($artikelen as $artikel => $aantal) {
            $artikel = $databaseArtikelen->find($artikel);
            $this->aantalBijwerken($voorraadLocatie, $artikel, $aantal);
        }

        return redirect()->action("VoorraadController@locatie", ['locatieCode' => $locatieCode]);
    }

    // Functie om eenvoudiger de aantallen aan te passen
    // gebruik eg. -2 om er 2 weg te halen
    private function aantalBijwerken($locatie, $artikel, $aantal)
    {
        if ($aantal == 0) {
            return;
        }

        foreach ($locatie->voorraad as $key => $voorraad) {
            if ($voorraad->artikel->productCode == $artikel->productCode) {
                $voorraad->aantal = $voorraad->aantal + $aantal;
                if ($voorraad->aantal < 1) {
                    $voorraad->delete();
                } else {
                    $voorraad->save();
                }
                return;
            }
        }

        if ($aantal > 0) {
            Voorraad::create([
                'locatieCode' => $locatie->locatieCode,
                'productCode' => $artikel->productCode,
                'aantal' => $aantal
            ]);
        }
    }
}
