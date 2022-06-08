@extends('layouts.base')

@push('head')
@endpush

@section('title', 'Chat')

@section('scripts')
<script>
$(function (){
    var objDiv = document.getElementById("chat-container");
    objDiv.scrollTop = objDiv.scrollHeight;
});
</script>
@endsection

@section('content')
<section class="py-5 container">

<div class="page-header py-3 m-8 mx-auto">
	<h1 class="fw-dark text-center">Chat</h1>
</div>

@if (count($rubrica)==0)
	@if (auth()->user()->hasRole('locatore'))
		<h4 class="text-center">Al momento nessun locatario ha opzionato un tuo alloggio, torna piu' tardi!</h4>
		<h4 class="text-center">Per aumentare le tue chances, <a href="{{ route('lore.accom.new') }}">inseriscine uno!</a></h4>
	@endif
	@if (auth()->user()->hasRole('locatario'))
		<h4 class="text-center">
		Nessuna conversazione passata, opziona un alloggio nel <a href="{{ route('lario') }}">nostro catalogo!</a>
		<br/>
		Se hai delle domande da porre al locatore potrai avviare una conversazione con lui!
		</h4>
	@endif
@else

<div class="d-flex overflow-hidden" style="max-height:70%;">
	<div class="deck-columns overflow-auto" style="width:20%; height:43rem">
		@foreach ($rubrica as $user)
			@include ('components.rubricCard', [ 'user' => $user] )
		@endforeach 
	</div>
	<div class="vr"></div>
	<div class="container" style="width:80%; max-height:70%;">
		<h5 class="h-20">
		@if($chatId!=null)
			{{$rubrica->where('id', $chatId)->first()->nome." ".
					$rubrica->where('id', $chatId)->first()->cognome}}
		@else
			{{$rubrica->first()->nome." ".$rubrica->first()->cognome}}
		@endif
		</h5>
		<hr/>
		<div id="chat-container" class="container overflow-auto" style="height:37rem">
			@foreach ($messaggi as $messaggio)
				@include ('components.messageCard', [ 'messaggio' => $messaggio])
			@endforeach 
		</div>
		<div>
			{{ Form::open(array('route' => array('chat.send', 
				$chatId ?? $rubrica->first()->id), 'id' => 'sendMessage','files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
				{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1']) }}
				{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@endif
@endsection
