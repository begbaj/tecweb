@extends('layouts.locatario')

@section('title', 'Area Amministratore')

@section('content')
<div class="static">
    <p>Area Admin</p>
    <p>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</p>
</div>
