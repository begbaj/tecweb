@extends('layouts.locatore')

@section('title', 'Nuovo Alloggio')

@section('content')
{{ Form::open(['route' => 'newaccom', 'id' => 'newaccom-form', 'files' => true]) }}

    {{ Form::label('titolo', 'Titolo', ['class' => 'col-sm-2 col-form-label',  'for'=>'titolo']) }}
    
    {{ Form::label('desc', 'Descrizione', ['class' => 'col-sm-2 col-form-label',  'for'=>'desc']) }}
    {{ Form::label('tipo', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'tipo']) }}
    {{ Form::label('etamin', 'Età minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamin']) }}
    {{ Form::label('etamax', 'Età massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'etamax']) }}
    {{ Form::label('gender', 'Preferenza di genere', ['class' => 'col-sm-2 col-form-label',  'for'=>'gender']) }}
    {{ Form::label('price', 'canone', ['class' => 'col-sm-2 col-form-label',  'for'=>'price']) }}
    {{ Form::label('surface', 'Superficie', ['class' => 'col-sm-2 col-form-label',  'for'=>'surface']) }}
    {{ Form::label('datamin', 'Data minima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamin']) }}
    {{ Form::label('datamax', 'Data massima', ['class' => 'col-sm-2 col-form-label',  'for'=>'datamax']) }}
    {{ Form::label('type', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'type']) }}
    {{ Form::label('province', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'province']) }}
    {{ Form::label('city', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'city']) }}
    {{ Form::label('address', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'address']) }}
    {{ Form::label('cap', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'cap']) }}
    {{ Form::label('bedrooms', 'Tipo', ['class' => 'col-sm-2 col-form-label',  'for'=>'bedrooms']) }}
    {{ Form::label('services', 'Servizi', ['class' => 'col-sm-2 col-form-label',  'for'=>'services']) }}

{{ Form::close() }}
@endsection
