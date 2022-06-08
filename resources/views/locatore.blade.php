@extends('layouts.base')

@section('title', 'Area Locatore')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/card-truncator.js') }}"> </script>
@endsection
@section('content')
<h1> I tuoi annunci </h1>
<div class="card-columns">
    @if (!isset($accoms) || count($accoms) < 1)
        <p> Non hai ancora creato nessun annuncio! Fallo ora <a href="{{ route('lore.accom.new') }}"> + </a> </p>
    @else
        @include('components.miniCatalog', ['accoms' => $accoms])
    @endif
</div>
@endsection
