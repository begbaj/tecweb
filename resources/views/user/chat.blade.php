@extends('layouts.wapp')

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
<div class='container-fluid row'> 
    <div class="page-header py-3 m-8">
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
    <center>
    <div class="row cloud-container-lg mx-5">
            <div class="col-sm-2 overflow-auto deck-columns" style="height: 800px;">
                    @foreach ($rubrica as $user)
                            @include ('components.rubricCard', [ 'user' => $user] )
                    @endforeach 
            </div>
            <div class="vr"></div>
            <div class="col row row-cols-1 overflow-auto" style="height: 800px;"> 
                    <div class="col bg-light d-flex justify-content-center align-items-center">
                        <h3><strong><a href="{{ route('user.profile', [$chatId ?? $rubrica->first()->id]) }}" style="color: black; text-decoration: none;">
                        @if($chatId!=null)
                                {{$rubrica->where('id', $chatId)->first()->nome." ".
                                                $rubrica->where('id', $chatId)->first()->cognome}}
                        @else
                                {{$rubrica->first()->nome." ".$rubrica->first()->cognome}}
                        @endif
                        </a></strong>
                        </h3>
                    </div>
                    <hr/>
                    <div id="chat-container" class="col overflow-auto" style="height: 75%;">
                            @foreach ($messaggi as $messaggio)
                                    @include ('components.messageCard', [ 'messaggio' => $messaggio])
                            @endforeach 
                    </div>
                    <div class="col">
                            {{ Form::open(array('route' => array('chat.send', 
                                    $chatId ?? $rubrica->first()->id), 'id' => 'sendMessage','files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
                                    {{ Form::text('testo','', ['placeholder'=> 'Messaggio', 'class' => 'form-control m-1']) }}
                                    {{ Form::submit('Invia', ['class' => 'btn btn-primary m-1']) }}
                            {{ Form::close() }}
                    </div>
            </div>
    </div>
    </center>
    @endif
</div>
@endsection
