@extends('layouts.locatore')

@section('title', 'Area Amministratore')

@section('content')
<div class="static">
    <p>Area Admin</p>
    <p>Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
</div>
