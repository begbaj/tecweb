@extends('layouts.base')

@section('title', 'Opzioni')

@section('scripts')
@endsection
@section('content')
<h1><center>Alloggi opzionati</center></h1>
@if (count($alloggiOpzionati) + count($alloggiOttenuti) + count($alloggiNonOttenuti)==0)
<h3><center>Non hai opzionato alcun alloggio, controlla il nostro <a href="{{ route('lario') }}">nostro catalogo!</a></center></h3>
@endif
@if (count($alloggiOpzionati)>0)
<h3>In attesa di risposta <img src="{{asset('img/svg/chevron-down.svg')}}"  alt= "" width="40px" height="40px"></h3>
	<div id="container-attese" class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiOpzionati])
		</div>
	</div>
<hr/>
@endif
@if (count($alloggiOttenuti)>0)
<h3>Ottenuti <img src="{{asset('img/svg/chevron-down.svg')}}"  alt= "" width="40px" height="40px"></h3>
	@if (count($alloggiOttenuti)>0)
	<div id="container-ottenuti" class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiOttenuti])
		</div>
	</div>
	@endif
<hr/>
@endif
@if (count($alloggiNonOttenuti)>0)
<h3>Non Ottenuti <img src="{{asset('img/svg/chevron-down.svg')}}"  alt= "" width="40px" height="40px"></h3>
	@if (count($alloggiNonOttenuti)>0)
	<div id="container-nonottenuti" class=container>
		<div class="card-columns">
		@include('components.miniCatalog', ['accoms' => $alloggiNonOttenuti])
		</div>
	</div>
	@endif
<hr/>
@endif
@endsection
