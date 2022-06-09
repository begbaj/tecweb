@extends('layouts.wapp')

@section('title', 'Area Locatore')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/card-truncator.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lore.js') }}"></script>
@endsection

@section('content')

<div class="row cloud-container-lg m-4">
    <span class="my-4"><h1><center> I tuoi annunci</center></h1></span>
    @if ((!isset($accomsAttivi) AND !isset($accomsAssegnati)) || count($accomsAttivi)+count($accomsAssegnati) < 1)
        <p> Non hai ancora creato nessun annuncio! Fallo ora <a href="{{ route('lore.accom.new') }}"> + </a> </p>
    @else
	@if (count($accomsAttivi)>0)
		<div id="container-attivi" class="col p-1">
		        <center><h3>Attivi</h3></center>
			<div class="card-columns">
			@include('components.miniCatalog', ['accoms' => $accomsAttivi])
			</div>
		</div>
	@endif
	@if (count($accomsAssegnati)>0)
		<div id="container-assegnati" class="col p-1">
		        <center><h3>Assegnati</h3></center>
			<div class="card-columns">
			@include('components.miniCatalog', ['accoms' => $accomsAssegnati])
			</div>
		</div>
	@endif
	
	</div>
    @endif
</div>
@endsection
