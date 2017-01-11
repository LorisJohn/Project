@extends('_layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Locatie Toevoegen</h2>
    <form method="POST" action="{{ url('/locatie/toevoegen') }}">
        {!! csrf_field() !!}

        <input type="hidden" name="_method" value="PUT" />

        <div class="form-group row">
            <label class="form-control-label">Locatie Naam:
                <input type="text" name="locatie" value="{{ old('locatie')  }}" />
            </label>
        </div>
        <div class="form-group row">
            <input type="submit" class="btn btn-primary" value="Toevoegen" />
        </div>
    </form>
@endsection
