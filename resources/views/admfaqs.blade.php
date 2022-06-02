@extends('layouts.admin')

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
      {{ Form::open(array('route' => 'gestionefaqs', 'class' => 'contact-form')) }}
                <div class= "d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}
                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                            {{ Form::text('domanda', '', ['class' => 'input','id' => 'domanda']) }}
                            </div>
                        </div>
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
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50 ">
                        {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                                {{ Form::password('risposta', ['class' => 'input', 'id' => 'risposta']) }}
                            </div>
                        </div>
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
            <div class="text-center mt-3">
                {{ Form::submit('Login', ['class' => 'btn btn-primary mb-3 mt-2']) }}      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <button type="button" class="btn btn-primary">Salva</button>
      </div>
    </div>       
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


<br>
<hr>
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary">Modifica</button>
    <button type="button" class="btn btn-danger">Elimina</button>
</div>
<br>
<div class="container text-center">
<p class= "text-dark"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<p class="text-secondary">{{ $faq->risposta }} </p>
</div>
<hr>
@endforeach
@endisset()
</div>
@endsection