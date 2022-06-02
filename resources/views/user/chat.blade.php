@extends('layouts.chat')

@push('head')
@endpush

@section('title', 'Chat')

@section('content')
<section class="py-5 container">

<div class="page-header py-3 m-8 mx-auto">
	<h1 class="fw-dark text-center">Chat</h1>
</div>
@if(count($rubrica)==0)
	@if(auth()->user()->hasRole('locatore'))
		<h4 class="text-center">Al momento nessun locatario ha opzionato un tuo alloggio, torna piu' tardi!</h4>
		<h4 class="text-center">Per aumentare le tue chances, <a href="{{ route('newaccom') }}">inseriscine uno!</a></h4>
	@endif
	@if(auth()->user()->hasRole('locatario'))
		<h4 class="text-center">
		Nessuna conversazione passata, opziona un alloggio nel <a href="{{ route('locatario') }}">nostro catalogo!</a>
		<br/>
		Se hai delle domande da porre al locatore potrai avviare una conversazione con lui!
		</h4>
	@endif
@else
<div class="d-flex h-50">
	<div class="deck-columns h-100 overflow-auto" style="max-width:20%">
	@foreach($rubrica as $user)
        	@include('components.rubricCard', [ '$user' => $user] )
	@endforeach 
	</div>
	<div class="vr"></div>
	<div class="container h-100" style="max-width:80%">
		<h5 class="h-20">
		@if($chatId!=null)
			{{$rubrica->where('id', $chatId)->first()->nome." ".
					$rubrica->where('id', $chatId)->first()->cognome}}
		@else
			{{$rubrica->first()->nome." ".$rubrica->first()->cognome}}
		@endif
		</h5>
		<hr/>
	<div class="container h-75 overflow-auto">
		@foreach($messaggi as $messaggio)
			@include('components.messageCard', [ '$messaggio' => $messaggio])
		@endforeach 
	</div>
	<div>
	{{ Form::open(array('route' => array(auth()->user()->hasRole('locatario') ? 'chatLocatario.send' : 'chatLocatore.send', 
		$data['chatId'] ?? $rubrica->first()->id), 'id' => 'sendMessage', 'id_destinatario' => $chatId,'files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
		{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1']) }}
		{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
        {{ Form::close() }}
	</div>
	</div>
</div>
@endif
@endsection
