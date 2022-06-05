@extends('layouts.base')

@section('title', 'Dettagli Annuncio')

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
                   @if(!isset($alloggio->eta_min)) 
                   Età: Nessuna preferenza
                   @else
                   Età minima consentita: {{$alloggio->eta_min}}
                   <br>
                   Età massima consentita: {{$alloggio->eta_max}}
                   @endif
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
                    @elseif ($alloggio->sesso == 'b') Non Binario
                    @else Nessuna preferenza
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
        <a class="btn btn-primary me-2" href="">Invia Messaggio</a>
        <a class="btn btn-success me-2 ms-3" href="">Opziona l'Alloggio</a>
    </div>
    <div class="container d-flex mt-3 visually-hidden">
	{{ Form::open(array('route' => array(auth()->user()->hasRole('locatario') ? 'chat.send' : 'chat.send', 
		 $alloggio->id_locatore), 'id' => 'sendMessage', 'id_destinatario' => $alloggio->id_locatore,'files' => false, 'class'=> 'form-inline d-flex mt-2 w-100')) }}
		{{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1 w-100']) }}
		{{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
        {{ Form::close() }}
    </div>
    @endif
</div>
@endsection

