@extends('layouts.public')

@section('title', 'Area Locatore')

@section('content')
<h1> I tuoi annunci </h1>
    @if (!isset($accoms) || count($accoms) < 1)
        <p> Non hai ancora creato nessun annuncio! Fallo ora <a href="{{ route('newaccom') }}"> + </a> </p>
    @else
        @include('components.miniCatalog', ['accoms' => $accoms])
    @endif
@endsection
