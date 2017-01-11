@extends('_layouts.app')

@section('title', 'Locatie Voorraad Verplaatsen')

@section('content')
    <h2>Producten Voorraad Verplaatsen</h2>
    <label>Locatie: {{ $voorraadLocatie->locatie }}</label>
    <form action="{{ action('VoorraadController@verplaatsenPatch', ['locatieCode' => $voorraadLocatie->locatieCode]) }}" method="POST">
        <label>Bestemming:
            <select id="locatieSelect" name="bestemmingsLocatieCode">
                @foreach($locaties as $locatie)
                    @if($locatie->locatieCode != $locatieCode)
                        <option value="{{ $locatie->locatieCode }}">{{ $locatie->locatie }}</option>
                    @endif
                @endforeach
            </select>
        </label>
        <input type="hidden" name="_method" value="PATCH" />
        {{ csrf_field() }}
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Fabriek</th>
                <th>Aantal Aanwezig</th>
                <th>Aantal Verplaatsen</th>
            </tr>
            </thead>
            <tbody>
            @if(is_object($voorraadLocatie))
                @foreach($voorraadLocatie->voorraad as $voorraadRegel)
                    <tr>
                        <td>{{ $voorraadRegel->artikel->product }}</td>
                        <td>{{ $voorraadRegel->artikel->type }}</td>
                        <td>{{ $voorraadRegel->artikel->fabriek->fabriek }}</td>
                        <td>{{ $voorraadRegel->aantal }}</td>
                        <td><input name="artikel[{{ $voorraadRegel->artikel->productCode }}]" value="0"></td>
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
            <br>
            <input type="submit" class="btn btn-primary pull-right" value="Verplaatsen" />
        </div>
    </form>
@endsection