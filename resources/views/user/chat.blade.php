@extends('layouts.chat')

@push('head')
@endpush

@section('title', 'Chat')

@section('content')
<section class="py-5 container">

<div class="page-header py-3 m-8 mx-auto">
	<h1 class="fw-dark text-center">Chat</h1>
</div>
<div class="d-flex h-50 overflow-hidden">
	<div class="deck-columns h-100 overflow-auto">
	@foreach($data['rubrica'] as $user)
        	@include('components.rubricCard', [ '$user' => $user] )
	@endforeach 
	</div>
	<div class="vr"></div>
	<div class="container h-100 overflow-hidden">
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
        {{ Form::open(array('route' => 'chatLocatario', 'id' => 'chat-invio', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
		{{ Form::text('Testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1']) }}
		{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
        {{ Form::close() }}
	</div>
	</div>
</div>
@endsection
