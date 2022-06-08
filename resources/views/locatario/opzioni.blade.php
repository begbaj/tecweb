@extends('layouts.base')

@section('title', 'Area Locatore')

@section('scripts')
@endsection
@section('content')
<h1>Le tue opzioni</h1>
<h3>In attesa</h3>
<div class="card-columns">
	@foreach ($opzioniAttese as $opzione)
		@include()
	@endforeach
</div>
<h3>Confermate</h3>
<div class="card-columns">
	@foreach ($opzioniConfermate as $opzione)
		@include()
	@endforeach
</div>
<h3>Passate</h3>
<div class="card-columns">
	
	@foreach ($opzioniPassate as $opzione)
		@include()
	@endforeach
</div>
@endsection
