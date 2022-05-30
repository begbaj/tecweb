@extends('layouts.locatore')

@section('title', 'Nuovo Alloggio')

@section('content')

{{ Form::open(['route' => 'insertaccom', 'id' => 'newaccom-form', 'files' => true]) }}

    <div class="mb-3">
        {{ Form::label('titolo', 'Titolo', ['class' => 'col-sm-2 col-form-label',  'for'=>'titolo']) }}
        {{ Form::text('desc', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('desc', 'Descrizione', ['class' => 'col-sm-2 col-form-label',  'for'=>'desc']) }}
        {{ Form::text('desc', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('tipo', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'tipo']) }}
        {{ Form::select('tipo', ['appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"],[], ['class' => 'form-control'] )}}
    </div>


    <div class="mb-3">
        {{ Form::label('etamin', 'Età minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamin']) }}
        {{ Form::number('etamin', '18', ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        {{ Form::label('etamax', 'Età massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamax']) }}
        {{ Form::number('etamax', '',['class' => 'form-control'] ) }}
    </div>

    <div class="mb-3">
        {{ Form::label('gender', 'Preferenza di genere', ['class' => 'col-sm-2 col-form-label',  'for'=>'gender']) }}
        {{ Form::select('gender', ['' => 'Nessuna Preferenza', 'm' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], [], ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('price', 'Canone', ['class' => 'col-sm-2 col-form-label',  'for'=>'price']) }}
        {{ Form::number('price', '0', ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        {{ Form::label('surface', 'Superficie', ['class' => 'col-sm-2 col-form-label',  'for'=>'surface']) }}
        {{ Form::number('surface', '0', ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        {{ Form::label('datamin', 'Data minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamin']) }}
        {{ Form::date('datamin', '', ['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        {{ Form::label('datamax', 'Data massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamax']) }}
        {{ Form::date('datamax', '' ,['class' => 'form-control']) }}
    </div>

    <div class="mb-3">
        {{ Form::label('province', 'Provincia', ['class' => 'col-sm-2 col-form-label',  'for'=>'province']) }}
        {{ Form::text('province', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('city', 'Città', ['class' => 'col-sm-2 col-form-label',  'for'=>'city']) }}
        {{ Form::text('city', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('address', 'Indirizzo', ['class' => 'col-sm-2 col-form-label',  'for'=>'address']) }}
        {{ Form::text('address', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('cap', 'CAP', ['class' => 'col-sm-2 col-form-label',  'for'=>'cap']) }}
        {{ Form::text('cap', '', ['class' => 'form-control'] )}}
    </div>

    <div class="mb-3">
        {{ Form::label('bedrooms', 'Camere', ['class' => 'col-sm-2 col-form-label',  'for'=>'bedrooms']) }}
        {{ Form::number('surface', '1', ['class' => 'form-control'] ) }}
    </div>

    <div class="mb-3">
        {{ Form::label('services', 'Servizi', ['class' => 'col-sm-2 col-form-label',  'for'=>'services']) }}
        <!-- TODO: servizi -->
    </div>
    <div class='d-flex'>
        {{ Form::submit("Inserisci alloggio", ['class' => 'btn btn-success']) }}
    </div>
{{ Form::close() }}

@endsection
