@extends('layouts.base')

@section('title', 'Gestione FAQs')

@section('content')
<div class="static">
<br><center><h1>FAQ</h1></center><br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Aggiungi</button>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Aggiungi FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
{{ Form::open(['route' => 'admin.faq.add']) }}
<div class='col'>
    <div class="col mb-3">
        {{ Form::label('domanda', 'Domanda', ['class' => 'col-sm-2 col-form-label',  'for'=>'domanda']) }}
        {{ Form::text('domanda', '', ['class' => 'form-control'] )}}
        @if ($errors->first('domanda'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('domanda') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
    <div class="col mb-3">
        {{ Form::label('risposta', 'Risposta', ['class' => 'col-sm-2 col-form-label',  'for'=>'risposta']) }}
        {{ Form::text('risposta', '', ['class' => 'form-control'] )}}
        @if ($errors->first('risposta'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('risposta') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
</div>
</div>       
      <div class="modal-footer">
        {{ Form::submit("Salva", ['class' => 'btn btn-primary']) }}

        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annulla</button>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}


<br>
<hr>
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $fq)
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary">Modifica</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{$fq->id}}">Elimina</button>
    <div class="modal fade" id="delete-{{$fq->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Elimina FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi di voler procedere con l'eliminazione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <a type="button" href='/admin/faq/remove/{{ $fq->id }}' class="btn btn-primary">Confermo</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container text-center">
    <p class="text-dark"> @php echo ++$count; @endphp {{ $fq->domanda }} </p>
    <p class="text-secondary">{{ $fq->risposta }} </p>
</div>
<hr>
@endforeach
@endisset()
</div>
@endsection
