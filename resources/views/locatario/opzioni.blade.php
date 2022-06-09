@extends('layouts.base')

@section('title', 'Opzioni')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/lario-opzioni.js') }}"></script>
@endsectii
@section('content')
<div class="container my-2" style="min-height: 800px;">
    <h1><center>Alloggi opzionati</center></h1>
    @if (count($alloggiOpzionati) + count($alloggiOttenuti) + count($alloggiNonOttenuti)==0)
    <h3><center>Non hai opzionato alcun alloggio, controlla il nostro <a href="{{ route('lario') }}">nostro catalogo!</a></center></h3>
    @endif

    @if (count($alloggiOpzionati)>0)
        <h3>Attesa di risposta<img  id="open_fields_btn-1" class="rotate-180" src="{{asset('img/svg/chevron-down.svg')}}" onclick="showFields(1)" width="40px" height="40px"></h3>
            <div id="container-attese" class="container my-2 fields-container-1">
                @include('components.miniCatalog', ['accoms' => $alloggiOpzionati])
            </div>
    @endif
    @if (count($alloggiOttenuti)>0)
        <h3>Cronologia Ottenuti <img  id="open_fields_btn-2" class="rotate-180" src="{{asset('img/svg/chevron-down.svg')}}" onclick="showFields(2)" width="40px" height="40px"></h3>
            <div id="container-ottenuti" class="container my-2 fields-container-2">
                @include('components.miniCatalog', ['accoms' => $alloggiOttenuti])
            </div>
    @endif
    @if (count($alloggiNonOttenuti)>0)
        <h3>Non pi&ugrave; disponibili <img  id="open_fields_btn-3" class="rotate-180" src="{{asset('img/svg/chevron-down.svg')}}" onclick="showFields(3)" width="40px" height="40px"></h3>
            <div id="container-nonottenuti" class="container my-2 fields-container-3">
                @include('components.miniCatalog', ['accoms' => $alloggiNonOttenuti])
            </div>
    @endif
</div>
@endsection
