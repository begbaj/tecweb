@extends('layouts.base')

@section('title', 'Area Locatore')

@section('scripts')
@endsection
@section('content')
<h1><center>Alloggi opzionati</center></h1>
<h3>In attesa di risposta<h3>
	<div class=container>
		<div class="card-columns">
		@foreach ($alloggiOpzionati as $alloggio)
			@include('components.longcard', ['accomodation' => $alloggio])
		@endforeach
		</div>
	</div>
<h3>Ottenuti<h3>
	<div class=container>
		<div class="card-columns">
		@foreach ($alloggiOttenuti as $alloggio)
			@include('components.longcard', ['accomodation' => $alloggio])
		@endforeach
		</div>
	</div>
<h3>Passati<h3>
	<div class=container>
		<div class="card-columns">
		@foreach ($alloggiNonOttenuti as $alloggio)
			@include('components.longcard', ['accomodation' => $alloggio])
		@endforeach
		</div>
	</div>
@endsection
