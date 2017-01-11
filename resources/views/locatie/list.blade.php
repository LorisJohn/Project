@extends('_layouts.app')

@section('title', 'Locaties Lijst')

@section('content')
    <h2>Locaties</h2>
    <a class="btn btn-default pull-right" href="{{ url('/locatie/toevoegen') }}">Nieuwe toevoegen</a>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Locatie</th>
            <th>Totale Inkoop Waarde</th>
            <th>Totale Verkoop Waarde</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locaties as $locatie)
            <tr>
                <td>{{ $locatie->locatie }}</td>
                <td>&#8364;{{ round($locatie->berekenInkoopWaarde(), 2) }}</td>
                <td>&#8364;{{ round($locatie->berekenVerkoopWaarde(), 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
