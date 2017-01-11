@extends('_layouts.app')

@section('title', 'Voorraad Zoeken')

@section('content')
    <h2>Voorraad Zoeken</h2>
    <form method="POST">
        {{ csrf_field() }}
        <label>Locatie:
            <select id="locatieSelect" name="locatieCode">
                @foreach($locaties as $locatie)
                    <option value="{{ $locatie->locatieCode }}" @if($locatie->locatieCode == $locatieCode) selected="selected" @endif>{{ $locatie->locatie }}</option>
                @endforeach
            </select>
        </label>

        <label>Product:
            <select id="productSelect" name="productNaam">
                @foreach($artikelNamen as $artikelNaam)
                    <option value="{{ $artikelNaam->product }}" @if($artikelNaam->product == $productNaam) selected="selected" @endif>{{ $artikelNaam->product }}</option>
                @endforeach
            </select>
        </label>

        <input type="submit" class="btn btn-primary" value="Zoeken" />
    </form>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Product</th>
            <th>Type</th>
            <th>Fabriek</th>
            <th>Inkoopprijs</th>
            <th>Verkoopprijs</th>
            <th>Aantal</th>
            <th>Inkoop Waarde</th>
            <th>Verkoop Waarde</th>
        </tr>
        </thead>
        <tbody>
        @forelse($resultaten as $voorraadRegel)
            <tr>
                <td>{{ $voorraadRegel->artikel->product }}</td>
                <td>{{ $voorraadRegel->artikel->type }}</td>
                <td>{{ $voorraadRegel->artikel->fabriek->fabriek }}</td>
                <td>{{ $voorraadRegel->artikel->inkoopprijs }}</td>
                <td>{{ $voorraadRegel->artikel->verkoopprijs }}</td>
                <td>{{ $voorraadRegel->aantal }}</td>
                <td>{{ $voorraadRegel->berekenInkoopWaarde() }}</td>
                <td>{{ $voorraadRegel->berekenVerkoopWaarde() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Geen resulaten gevonden</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection