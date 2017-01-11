@extends('_layouts.app')

@section('title', 'Locatie Voorraad Bewerken')

@section('content')
    <h2>Producten Voorraad Bewerken</h2>
    <label>Locatie: {{ $voorraadLocatie->locatie }}</label>
    <form action="{{ action('VoorraadController@bewerkenPatch', ['locatieCode' => $voorraadLocatie->locatieCode]) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH" />
        {{ csrf_field() }}
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Fabriek</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            @if(is_object($voorraadLocatie))
                @foreach($artikelen as $artikel)
                    <tr>
                        <td>{{ $artikel->product }}</td>
                        <td>{{ $artikel->type }}</td>
                        <td>{{ $artikel->fabriek->fabriek }}</td>
                        <td><input name="artikel[{{ $artikel->productCode }}]" value="0"></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Locatie niet gevonden</td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="form-inline">
            <label class="control-label">
                Actie: </label>
            <label class="radio">
                <input name="actie" value="1" type="radio" checked="checked"> Toevoegen
            </label>
            <label class="radio">
                <input name="actie" value="2" type="radio"> Verwijderen
            </label>
            <br>
            <input type="submit" class="btn btn-primary pull-right" value="Bewerken" />
        </div>
    </form>
@endsection