@extends('layouts.base')

@section('title', 'Area Locatore')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/card-truncator.js') }}"> </script>
</script>
@endsection
@section('content')
<h1><center> I tuoi annunci </center></h1>
    @if ((!isset($accomsAttivi) AND !isset($accomsAssegnati)) || count($accomsAttivi)+count($accomsAssegnati) < 1)
        <p> Non hai ancora creato nessun annuncio! Fallo ora <a href="{{ route('lore.accom.new') }}"> + </a> </p>
    @else
	@if (count($accomsAttivi)>0)
		<h3>Attivi <img src="{{asset('img/svg/chevron-down.svg')}}"  alt= "" width="40px" height="40px"></h3> 
		<div id="container-attivi" class=container>
			<div id="" class="card-columns">
			@include('components.miniCatalog', ['accoms' => $accomsAttivi])
			</div>
		</div>
	@endif
	@if (count($accomsAssegnati)>0)
		<h3>Assegnati <img src="{{asset('img/svg/chevron-down.svg')}}"  alt= "" width="40px" height="40px"></h3>
		<div id="container-assegnati" class=container>
			<div id="conta" class="card-columns">
			@include('components.miniCatalog', ['accoms' => $accomsAssegnati])
			</div>
		</div>
	@endif
	
    @endif
</div>
@endsection
