@extends('layouts.base')

@section('title', 'Dettagli Annuncio')


@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script type="text/javascript">

$.ajax({
   type:'GET',
   url: "{{ route('api.opzione', ['id_alloggio' => $alloggio->id, 'id_locatario' => auth()->user()->id])}}",
   data:'_token = <?php echo csrf_token(); ?>',
   success:isOptioned
});

function isOptioned(opzione){
	if(Object.keys(opzione).length>0){
		$('#button-opzione').prop("disabled", true)
		$('#button-opzione').html("Già opzionato")
	}
}

$(document).ready(function () {
	var buttonMessaggio = $('#button-messaggio')
	var buttonAnnullaMessaggio = $('#annulla-messaggio')
	var buttonOpzione = $('#button-opzione')
	var buttonAnnullaOpzione = $('#annulla-opzione')
	var containerMessaggio = $('#messaggioContainer')
	var containerOpzione = $('#opzione-container')

	buttonMessaggio.click(function () {	
		containerMessaggio.removeClass("visually-hidden")
		buttonMessaggio.prop("disabled", true)
		buttonOpzione.prop("disabled", true)
	});
	
	buttonAnnullaMessaggio.click(function(){
		containerMessaggio.addClass("visually-hidden")
		buttonMessaggio.prop("disabled", false)
		buttonOpzione.prop("disabled", false)
		
	});

	buttonOpzione.click(function () {
		containerOpzione.removeClass("visually-hidden")
		buttonMessaggio.prop("disabled", true)
		buttonOpzione.prop("disabled", true)
	});

	buttonAnnullaOpzione.click(function(){
		containerOpzione.addClass("visually-hidden")
		buttonMessaggio.prop("disabled", false)
		buttonOpzione.prop("disabled", false)
	});
});
</script>
@endsection

@section('content')
<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3 pb-4">
            <h2><strong>Dettagli dell'Annuncio</strong></h2>    
        </div>
        <h6 class="lead"><strong>{{$alloggio->titolo}}</strong></h6>
    </div>
    
    <div class="container-fluid d-flex justify-content-center mt-4">
        <div class="border border-secondary pt-2 pb-2 ps-2 pe-2">
            <img src="{{asset('assets/'. $alloggio->id . '/thumbnail')}}" style="width: 450px; height: 350px">
        </div>    
    </div>
    
    <div class="container-fluid border-top border-dark mt-5 pt-2">
        <div class="d-flex justify-content-center mt-2">
            <p class="lead">{{$alloggio->descrizione}}</p>
        </div>
    </div>
    
    <div class="container-fluid border-top border-dark mt-2 pt-3">
        <h4><strong>Informazioni che possono interessarti...</strong></h4> 
        
        <div class="row d-flex align-items-center">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="{{ asset('img/svg/watch.svg') }}" style="width:35px; height: 35px">
                </div>
                <div class ="col-sm-10 lead">
                   Età minima consentita: {{$alloggio->eta_min}}
                   <br>
                   Età massima consentita: {{$alloggio->eta_max}}
                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width: 450px">
                <div class="col">
                    <img src="{{ asset('img/svg/gender-trans.svg') }}" style="width:35px; height: 35px">
                </div>
                <div class ="col-sm-10 lead">
                    Genere:
                    @if ($alloggio->sesso == 'm') Maschio
                    @elseif ($alloggio->sesso == 'f') Femmina 
                    @else ($alloggio->sesso == 'b') Binario
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row d-flex align-items-center mt-3">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="{{ asset('img/svg/cash-stack.svg') }}" style="width:35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Prezzo: {{($alloggio->prezzo)}} €
                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width:450px">
                <div class="col">
                    <img src="{{ asset('img/svg/aspect-ratio.svg') }}" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Dimensione Locale: {{$alloggio->superficie}} Mq.
                </div>
            </div>
        </div>
        
        <div class="row d-flex align-items-center mt-3">
            <div class="d-flex row mt-4 align-items-center" style="width: 450px">
                <div class="col">
                    <img src="{{ asset('img/svg/calendar-range.svg') }}" style="width: 35px; height:35px"> 
                </div>
                <div class="col-sm-10 lead">
                    Data Inizio Disponibilità: {{substr($alloggio->data_min, 0, -8)}}
                    <br>
                    Data Fine Disponibilità: {{substr($alloggio->data_max, 0, -8)}}
                </div>
            </div>
            
            <div class="d-flex row mt-4 align-items-center ms-4" style="width: 450px">
                <div class="col">
                    <img src="{{ asset('img/svg/house-door.svg') }}" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-10 lead">
                    Tipologia Alloggio:
                    @if ($alloggio->tipo == 'posto_letto') Posto Letto
                    @else 
                    Appartamento 
                    <br>
                    N° Camere: {{$alloggio->camere}}
                    @endif
                </div>
            </div>
        </div>
        
        <div class="d-flex row mt-4 align-items-center">
            <div class="d-flex row align-items-center" style="width: 850px">
                <div class="col-sm-1" >
                    <img src="{{ asset('img/svg/geo-alt.svg') }}" style="width: 35px; height: 35px">
                </div>
                <div class="col-sm-auto lead">
                    <div class="d-flex justify-content-start">
                    Provincia: {{$alloggio->provincia}}
                    <br>
                    Città: {{$alloggio->citta}}
                    <br>
                    Indirizzo: {{$alloggio->indirizzo}}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex row mt-5 align-items-center">
            <div class="d-flex row  align-items-center">
                <div class="col-sm-1">
                    <img src="{{ asset('img/svg/services.svg') }}" style="width: 45px; height: 45px">
                </div>
                
                <div class="col-sm-2">
                    <h4><strong>Servizi</strong></h4> 
                </div>     
            </div>
            
            <div class="lead mt-3">
                @foreach($servizi as $servizio)
                    @if($servizio->id < 16)
                    <div class="d-flex row align-items-center mt-2 ms-2" style="width: 450px">
                        <div class="col-sm-1">
                            <img src="{{asset('img/svg/servs/'.$servizio->nome.'.svg') }}" style="width: 25px; height:25px">
                        </div>
                        
                        <div class="col-sm-auto lead ms-2">
                        {{ucwords(str_replace("_", " ",$servizio->nome))}}    
                        </div>    
                    </div>
                    @endif
                @endforeach 
            </div>
        </div>
        <div class="d-flex row align-items-center mt-5">
            <div class="col-sm-1">
                <img src="{{ asset('img/svg/globe.svg') }}" style="width: 45px; height: 45px">
            </div>
                
            <div class="col-sm-2">
                <h4><strong>Vicino a...</strong></h4>
            </div>
                
            <div class="lead mt-3">
                @foreach($servizi as $servizio)
                    @if($servizio->id >= 16)
                    <div class="d-flex row align-items-center mt-2 ms-2" style="width: 450px">
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
    @if(auth()->user()->hasRole('locatario'))
    <div class="container d-flex justify-content-end mt-3">
        <button id='button-messaggio' class="btn btn-primary me-2">Invia Messaggio</button>
        <button id='button-opzione' class="btn btn-success me-2 ms-3">Opziona l'Alloggio</button>
    </div>
    <div id="messaggioContainer" class="container d-flex mt-3 visually-hidden">
	{{ Form::open(array('route' => array('chat.send', $alloggio->id_locatore), 
			'id' => 'sendMessage', 'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100')) }}
		{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1 w-100']) }}
		{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
        {{ Form::close() }}
	<button id="annulla-messaggio" type="button" class="btn btn-danger">Annulla</button>
    </div>
    <div id="opzione-container" class="container d-flex mt-3 visually-hidden">
	{{ Form::open(array('route' => array('chat.send', $alloggio->id_locatore),
		'id' => 'sendOpzione', 'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100')) }}
		{{ Form::text('testo','Salve, sono '.ucwords(auth()->user()->nome.' '.auth()->user()->cognome).' e sono interessato a questo alloggio, può trovare i miei dati sul mio profilo!', ['placeholder'=> 'Messaggio di opzione', 'class' => 'form-control m-1 w-100']) }}
		{{ Form::submit('Opziona', ['class' => 'btn btn-success m-1']) }}
		<input type="hidden" name="id_alloggio" value="{{ $alloggio->id }}" readonly="readonly"/>
        {{ Form::close() }}
	<button id="annulla-opzione" type="button" class="btn btn-danger">Annulla</button>
    </div>
    @endif
</div>
@endsection

