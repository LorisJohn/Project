@extends('_layouts.app')

@section('title', 'Locatie Voorraad')

@section('content')
    <h2>Producten Voorraad</h2>
    <label>Locatie:
        <select id="locatieSelect" name="locatieCode">
            <option value="-1">Geen</option>
            @foreach($locaties as $locatie)
                <option value="{{ $locatie->locatieCode }}" @if($locatie->locatieCode == $locatieCode) selected="selected" @endif>{{ $locatie->locatie }}</option>
            @endforeach
        </select>
    </label>
    @if(is_object($voorraadLocatie))
        <a class="btn btn-default pull-right" href="{{ action('VoorraadController@bewerken', ['locatieCode' => $voorraadLocatie->locatieCode]) }}">Voorraad Bewerken</a>
        <a class="btn btn-default pull-right" href="{{ action('VoorraadController@verplaatsen', ['locatieCode' => $voorraadLocatie->locatieCode]) }}">Voorraad Verplaatsen</a>
    @endif
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
        @if(is_object($voorraadLocatie))
            @if($voorraadLocatie->voorraad->isEmpty())
                <tr>
                    <td colspan="4">Deze locatie heeft geen artikelen op voorraad</td>
                </tr>
            @else
                @foreach($voorraadLocatie->voorraad as $voorraadRegel)
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
                @endforeach
                <tr>
                    <td colspan="4"><b>Totale Inkoop Waarde: {{ $voorraadLocatie->berekenInkoopWaarde() }}</b></td>
                    <td colspan="4"><b>Totale Verkoop Waarde: {{ $voorraadLocatie->berekenVerkoopWaarde() }}</b></td>
                </tr>
            @endif

        @else
            <tr>
                <td colspan="4">Selecteer alstublieft een locatie</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        // TODO: find "cleaner" solution?
        $(document).ready(function() {
            $('#locatieSelect').on('change', function() {
                var baseUrl = "{{ url('/voorraad/locatie') }}";

                // om te voorkomen dat -1 in de url komt
                if (this.value == "-1") return window.location = baseUrl;

                window.location = baseUrl+"/"+this.value;
            });
        });
    </script>
@endsection