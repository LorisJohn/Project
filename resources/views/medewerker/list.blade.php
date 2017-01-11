@extends('_layouts.app')

@section('title', 'Medewerkers Lijst')

@section('content')
    <h2>Medewerkers Lijst</h2>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Gebruikersnaam</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medewerkers as $medewerker)
            <tr>
                <td>{{ $medewerker->voorletters }} {{ $medewerker->voorvoegsels }} {{ $medewerker->achternaam }}</td>
                <td>{{ $medewerker->gebruikersnaam }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection