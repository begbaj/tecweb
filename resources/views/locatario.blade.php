@extends('layouts.locatario')

@section('title', 'Area Locatario')

@section('content')
<div class="static">
    <p>Area Locatario</p>
    <p>Benvenuto {{ Auth::users()->nome }} {{ Auth::user()->cognome }}</p>
</div>
@endsection