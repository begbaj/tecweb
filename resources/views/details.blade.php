@extends('layouts.base')

@section('title', 'Dettagli Annuncio')


@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).ready(function () {
	var buttonMessaggio = $('#button-messaggio')
	var buttonAnnullaMessaggio = $('#annulla-messaggio')
	var buttonOpzione = $('#button-opzione')
	var buttonAnnullaOpzione = $('#annulla-opzione')
	var containerMessaggio = $('#messaggioContainer')
	var containerOpzione = $('#opzione-container')
	var disabled=false
	if(buttonOpzione.prop('disabled')==true){
		var disabled=true;
	}

	buttonMessaggio.click(function () {	
		containerMessaggio.removeClass("visually-hidden")
		buttonMessaggio.prop("disabled", true)
		buttonOpzione.prop("disabled", true)
	});
	
	buttonAnnullaMessaggio.click(function(){
		containerMessaggio.addClass("visually-hidden")
		buttonMessaggio.prop("disabled", false)
		if(!disabled){
			buttonOpzione.prop("disabled", false)	
		}
	});

	buttonOpzione.click(function () {
		containerOpzione.removeClass("visually-hidden")
		buttonMessaggio.prop("disabled", true)
		buttonOpzione.prop("disabled", true)
	});

	buttonAnnullaOpzione.click(function(){
		containerOpzione.addClass("visually-hidden")
		buttonMessaggio.prop("disabled", false)
		if(!disabled){
			buttonOpzione.prop("disabled", false)
		}
	});
});
</script>
@endsection

@section('content')
<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3 pb-4">
            <div class="text-wrap text-break">
                <h2><strong>{{$alloggio->titolo}}</strong></h2>
			
		@if (auth()->user()->hasRole('locatario'))
			@if ($alloggio->confermato==false AND count($opzioni)==0)
				<h3 class="text-success"><strong>Alloggio disponibile.</strong></h3>
			@elseif ($alloggio->confermato==true AND count($opzioni)>0)
				<h3 class="text-success"><strong>La tua richiesta è stata accettata. 
				<a href="{{route('chat.contract',[$opzioni->first()->id_alloggio, $opzioni->first()->id_mittente])}}">Vedi contratto</a></strong></h3>
			@elseif ($alloggio->confermato==true AND count($opzioni)==0)
				<h3 class="text-danger"><strong>Questo alloggio è già stato assegnato.</strong></h3>
			@elseif ($alloggio->confermato==false AND count($opzioni)>0)
				<h3 class="text-success"><strong>Hai già opzionato questo alloggio.</strong></h3>
			@endif
		@elseif ($alloggio->id_locatore==auth()->user()->id)
			@if ($alloggio->confermato==true AND count($opzioni)>0)
				<h3 class="text-success"><strong>Hai già assegnato questo alloggio. 
				<a href="{{route('chat.contract',[$opzioni->first()->id_alloggio, $opzioni->first()->id_mittente])}}">Vedi contratto</a></strong></h3>
			@elseif ($alloggio->confermato==false AND count($opzioni)>0)
				<h3>Il tuo alloggio e' stato opzionato, <a href="#opzioni">controlla ora!</a>
			@endif
		@elseif ($alloggio->confermato)
				<h3 class="text-danger"><strong>Questo alloggio è già stato assegnato.</strong></h3>
		@else
				<h3 class="text-success"><strong>Alloggio disponibile.</strong></h3>
		@endif
            </div>
            @auth
                @if(Auth::user()->id == $alloggio->id_locatore )
                    <a href="{{ route('lore.accom.edit', ['id'=>$alloggio->id]) }}"> <button class="btn btn-secondary"> Modifica annuncio</button> </a>
                @endif
            @endauth
        </div>
    </div>
    <div class="row m-5">
            <div class="col mx-1 shadow border border-secondary p-2">
                <center><img src="{{asset('assets/'. $alloggio->id . '/thumbnail')}}" style="max-width: 600px; max-height: 600px"></center>
            </div>    
            <div class="col mx-3">
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/geo-alt.svg') }}" style="width: 35px; height: 35px">
                    </div>
                    <div class="col-sm-auto p-2 m-2 lead">
                        <div class="d-flex justp-2 ify-content-start">
                        Provincia: {{$alloggio->provincia}}
                        <br>
                        Città: {{$alloggio->citta}}
                        <br>
                        Indirizzo: {{$alloggio->indirizzo}} {{$alloggio->cap}}
                        </div>
                    </div>
                </div>
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/house-door.svg') }}" style="width: 35px; height: 35px">
                    </div>
                    <div class="col-sm-auto p-2 m-2 lead">
                        Tipologia Alloggio:
                        @if ($alloggio->tipo == 'posto_letto') Posto Letto
                        @else 
                        Appartamento 
                        <br>
                        N° Camere: {{$alloggio->camere}}
                        <br>
                        N° Posti Letto: {{$alloggio->posti_letto}}
                        @endif
                    </div>
                </div>
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/cash-stack.svg') }}" style="width:35px; height: 35px">
                    </div>
                    <div class="col-sm-auto p-2 m-2 lead">
                        Prezzo: {{($alloggio->prezzo)}} €
                    </div>
                </div>
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/aspect-ratio.svg') }}" style="width: 35px; height: 35px">
                    </div>
                    <div class="col-sm-auto p-2 m-2 lead">
                        Dimensione Locale: {{$alloggio->superficie}} Mq.
                    </div>
                </div>
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/calendar-range.svg') }}" style="width: 35px; height:35px"> 
                    </div>
                    <div class="col-sm-auto p-2 m-2 lead">
                        Data Inizio Disponibilità: {{substr($alloggio->data_min, 0, -8)}}
                        <br>
                        Data Fine Disponibilità: {{substr($alloggio->data_max, 0, -8)}}
                    </div>
                </div>
            </div>
    </div>
    <div class="container-fluid bg-light bg-gradient mt-2 pt-3">
        <h3><center><strong>Informazioni che possono interessarti...</strong></center></h3> 
        <div class="row">
            <div class="col bg-white shadow rounded m-3" style="max-height: 1000px;">
                    <h3>Descrizione</h3>
                    <div class="lead overflow-auto text-break text-wrap px-3" style="max-height: 90%;">{{$alloggio->descrizione}}</div>
            </div>
            <div class="col m-2 p-2">
                <div class="row">
                    <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                        <div class="col-sm-1 m-2" >
                            <img src="{{ asset('img/svg/watch.svg') }}" style="width:35px; height: 35px">
                        </div>
                        <div class="col-sm-auto p-2 m-2 lead">
                           @if (!isset($alloggio->eta_min)) Età: Nessuna preferenza
                           @else
                            Età minima consentita: {{$alloggio->eta_min}} <br>
                            Età massima consentita: {{$alloggio->eta_max}}
                           @endif
                        </div>
                    </div>
                    <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                        <div class="col-sm-1 m-2" >
                            <img src="{{ asset('img/svg/gender-trans.svg') }}" style="width:45px; height: 45px">
                        </div>
                        <div class="col-sm-auto p-2 m-2 lead">
                            Genere:
                            @if ($alloggio->sesso == 'm') Maschio
                            @elseif ($alloggio->sesso == 'f') Femmina 
                            @elseif ($alloggio->sesso == 'b') Non Binario
                            @else Nessuna preferenza
                            @endif
                        </div>
                    </div>
                    <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                        <div class="col-sm-1 m-2" >
                            <img src="{{ asset('img/svg/services.svg') }}" style="width: 45px; height: 45px"><br>
                            <center><small>Servizi</small></center>
                        </div>
                        <div class="col-sm-auto p-2 m-2 lead">
                            @foreach($servizi as $servizio)
                                @if($servizio->id < 16)
                                <div class="row align-items-center m-1"> 
                                    <div class="col-sm-1">
                                        <img src="{{asset('img/svg/servs/'.$servizio->nome.'.svg') }}" style="width: 25px; height:25px">
                                    </div>
                                    <div class="col-sm-auto lead m-1">
                                    {{ucwords(str_replace("_", " ",$servizio->nome))}}    
                                    </div>    
                                </div>
                                @endif
                            @endforeach 
                        </div>
                    </div>
                    <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                        <div class="col-sm-1 m-2" >
                            <img src="{{ asset('img/svg/globe.svg') }}" style="width: 45px; height: 45px"><br>
                            <center><small>Vicino</small></center>
                        </div>
                        <div class="col-sm-auto p-2 m-2 lead">
                            @foreach($servizi as $servizio)
                                @if($servizio->id >= 16)
                                <div class="row align-items-center mt-2 ms-2"> 
                                    <div class="col-sm-1">
                                        <img src="{{asset('img/svg/servs/'.$servizio->nome.'.svg') }}" style="width: 25px; height: 25px">
                                    </div>
                                    <div class="col-sm-auto lead ms-2">
                                    {{substr(ucwords(str_replace("_", " ", $servizio->nome)), 7)}}    
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    @if (auth()->user()->hasRole('locatario'))
	    <div class="container d-flex justify-content-end mt-3">
		<button id='button-messaggio' class="btn btn-primary me-2">Invia Messaggio</button>
	    	@if ($alloggio->confermato==false)
			@if (count($opzioni)==0)
			<button id='button-opzione' class="btn btn-success me-2 ms-3">Opziona l'Alloggio</button>
			@else
			<button id='button-opzione' class="btn btn-success me-2 ms-3" disabled="disabled">Alloggio opzionato</button>
			@endif
		@else
			<button id='button-opzione' class="btn btn-success me-2 ms-3" disabled="disabled">Alloggio assegnato</button>
		@endif
	    </div>
	    <div id="messaggioContainer" class="container d-flex align-items-center mt-3 visually-hidden">
		{{ Form::open(array('route' => array('chat.send', $alloggio->id_locatore), 
				'id' => 'sendMessage', 'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100')) }}
			{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1 w-100']) }}
			{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
		{{ Form::close() }}
		<button id="annulla-messaggio" type="button" class="btn btn-danger mt-2">Annulla</button>
	    </div>
	    @if ($alloggio->confermato==false AND count($opzioni)==0)
	    <div id="opzione-container" class="container d-flex align-items-center mt-3 visually-hidden">
		{{ Form::open(array('route' => array('chat.send', $alloggio->id_locatore),
			'id' => 'sendOpzione', 'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100')) }}
			{{ Form::text('testo','Salve, sono '.ucwords(auth()->user()->nome.' '.auth()->user()->cognome).' e mi piacerebbe affittare questo alloggio, può trovare i miei dati sul mio profilo!', ['placeholder'=> 'Messaggio di opzione', 'class' => 'form-control m-1 w-100']) }}
			{{ Form::submit('Opziona', ['class' => 'btn btn-success m-1']) }}
			<input type="hidden" name="id_alloggio" value="{{ $alloggio->id }}" readonly="readonly"/>
		{{ Form::close() }}
		<button id="annulla-opzione" type="button" class="btn btn-danger mt-2">Annulla</button>
	    </div>
	    @endif
    @endif
    
    @if (auth()->user()->id == $alloggio->id_locatore)
	<div id="opzioni" class="container mt-2 pt-3">
    	@if ($alloggio->confermato==false)
		<h3><center><strong>Opzioni ricevute</strong><center></h3>
		@if(count($opzioni)==0)
		<h5><center>Nessuna opzione ricevuta, torna più tardi!<center></h5>
		@endif
		<div class="card-columns">
		@foreach ($opzioni as $messaggio)
			@include ('components.optionCard', ['messaggio' => $messaggio])
		@endforeach
		<div>
	@else
		<h3><center><strong>Opzione confermata</strong><center></h5>
		<div class="card-columns">
		@if(count($opzioni)!=0)
			@include ('components.optionCard', ['messaggio' => $opzioni->first()])
		@endif
		<div>
		@if(count($opzioni)>1){
			<h3><center><strong>Altre opzioni</strong><center></h5>
			<div class="card-columns">
			@foreach ($opzioni->splice(1) as $messaggio)
				@include ('components.optionCard', ['messaggio' => $messaggio])
			@endforeach
			<div>
		@endif
	@endif
	</div>
    @endif
</div>
@endsection

