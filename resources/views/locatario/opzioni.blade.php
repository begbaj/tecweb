@extends('layouts.base')

@section('title', 'Opzioni')

@section('scripts')
@endsection
@section('content')
<h1><center>Alloggi opzionati</center></h1>
<h3>In attesa di risposta - {{count($alloggiOpzionati)}}</h3>
	@if (count($alloggiOpzionati)>0)
	<div class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiOpzionati])
		</div>
	</div>
	@endif
<hr/>
<h3>Ottenuti - {{count($alloggiOttenuti)}}</h3>
	@if (count($alloggiOttenuti)>0)
	<div class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiOttenuti])
		</div>
	</div>
	@endif
<hr/>
<h3>Non Ottenuti - {{count($alloggiNonOttenuti)}}</h3>
	@if (count($alloggiNonOttenuti)>0)
	<div class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiNonOttenuti])
		</div>
	</div>
	@endif
<hr/>
@endsection
