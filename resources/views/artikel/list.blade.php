@extends('_layouts.app')

@section('title', 'Producten Lijst')

@section('content')
    <h2>Producten Lijst</h2>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Product</th>
            <th>Type</th>
            <th>Fabriek</th>
            <th>Inkoopprijs</th>
            <th>Verkoopprijs</th>
        </tr>
        </thead>
        <tbody>
        @foreach($artikelen as $artikel)
            <tr>
                <td>{{ $artikel->product }}</td>
                <td>{{ $artikel->type }}</td>
                <td>{{ $artikel->fabriek->fabriek }}</td>
                <td>{{ $artikel->inkoopprijs }}</td>
                <td>{{ $artikel->verkoopprijs }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection