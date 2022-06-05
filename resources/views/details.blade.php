@extends('layouts.base')

@section('title', 'Dettagli Annuncio')

@section('content')
<div class="container-fluid bd-light">
    <div class="container row">
        @auth
            @if(Auth::user()->id == $alloggio->id_locatore )
                <a href="{{ route('lore.accom.edit', ['id'=>$alloggio->id]) }}"> <button class="btn btn-secondary"> Modifica annuncio</button> </a>
            @endif
        @endauth
        <div class="container mt-3 pb-4">
            <h2><strong>{{$alloggio->titolo}}</strong></h2>
        </div>
    </div>
    <div class="row">
            <div class="col mx-1 shadow-lg border border-secondary p-2">
                <img src="{{asset('assets/'. $alloggio->id . '/thumbnail')}}" style="max-width: 800px; max-height: 800px">
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
    <div class="container-fluid border border-dark mt-2 pt-3">
        <div class="row">
            <div class="col border-bottom border-top border-dark m-3 p-2">
                <div class="justify-content-center mt-2">
                    <p class="lead">{{$alloggio->descrizione}}</p>
                </div>
            </div>
            <div class="col">
                <h3><strong>Informazioni che possono interessarti...</strong></h3> 
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
                </div>
                <div class="my-1 border rounded row shadow align-items-center bg-white" style="max-width: 850px">
                    <div class="col-sm-1 m-2" >
                        <img src="{{ asset('img/svg/services.svg') }}" style="width: 45px; height: 45px">
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
                            <img src="{{ asset('img/svg/globe.svg') }}" style="width: 45px; height: 45px">
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

