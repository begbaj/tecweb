@extends('layouts.locatore')

@section('title', 'Area Locatore')

@section('content')
<div class="static">
    <p>Area Locatore</p>
    <p>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</p>
</div>
@endsection
