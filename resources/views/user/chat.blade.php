@extends('layouts.chat')

@push('head')
@endpush

@section('title', 'Chat')

@section('content')
<section class="py-5 container">

<div class="page-header py-3 m-8 mx-auto">
	<h1 class="fw-dark text-center">Chat</h1>
</div>
@if(count($data['rubrica'])==0)
	@if(auth()->user()->hasRole('locatore'))
		<h4 class="text-center">Al momento nessun locatario ha opzionato un tuo alloggio, torna piu' tardi!</h4>
		<h4 class="text-center">Se non ne hai gia' inserito uno, <a href="{{ route('newaccom') }}">perchè non farlo ora!</a></h4>
	@endif
	@if(auth()->user()->hasRole('locatario'))
		<h4 class="text-center">
		Nessun contatto, controlla <a href="{{ route('locatario') }}">il nostro catalogo</a>, li potrai avviare una conversazione con
		un locatore, o opzionare uno degli alloggi presenti!
		</h4>
	@endif
@else
<div class="d-flex h-50">
	<div class="deck-columns h-100 overflow-auto">
	@foreach($data['rubrica'] as $user)
        	@include('components.rubricCard', [ '$user' => $user] )
	@endforeach 
	</div>
	<div class="vr"></div>
	<div class="container h-100">
		<h5 class="h-20">
		@if($data['chatId']!=null)
			{{$data['rubrica']->where('id', $data['chatId'])->first()->nome." ".
					$data['rubrica']->where('id', $data['chatId'])->first()->cognome}}
		@else
			{{$data['rubrica'][0]->nome." ".$data['rubrica'][0]->cognome}}
		@endif
		</h5>
		<hr/>
	<div class="container h-75 overflow-auto">
		@foreach($data['messaggi'] as $messaggio)
			@include('components.messageCard', [ '$messaggio' => $messaggio])
		@endforeach 
	</div>
	<div>
	{{ Form::open(array('route' => array(auth()->user()->hasRole('locatario') ? 'chatLocatario.send' : 'chatLocatore.send', 
		$data['chatId'] ?? $data['rubrica'][0]->id), 'id' => 'sendMessage', 'id_destinatario' => $data['chatId'],'files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
		{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1']) }}
		{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
        {{ Form::close() }}
	</div>
	</div>
</div>
@endif
@endsection
