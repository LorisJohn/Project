@extends('_layouts.app')

@section('title', 'Fabrieken Lijst')

@section('content')
    <h2>Fabrieken Lijst</h2>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Fabriek</th>
            <th>Telefoon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fabrieken as $fabriek)
            <tr>
                <td>{{ $fabriek->fabriek }}</td>
                <td>{{ $fabriek->telefoon }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection