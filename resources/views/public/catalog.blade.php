@extends('layouts.public')

@section('title', 'Catalogo')

@section('content') 
  <section class="py-5 container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
        @if (!auth()->user('admin'))
        <p class="lead text-muted text-center"> <a id="registrazione" href="{{ route('register') }}"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
        @endif
      </div>
    </div>

{{Form::open(array('id' => 'filter-form', 'files' => false )) }}
    <div class='d-flex justify-content-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-items-center mt-5 pe-5">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                {{ Form::label('location', 'Località', ['class' => 'col-sm-2 col-form-label', 'for' => 'location']) }}
                <div class="col-sm-10 ps-3">
                {{ Form::text('location', '', ['value' => old("location"), 'placeholder'=> 'Località', 'class' => 'form-control ms-4']) }}
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                {{ Form::label('start-date', 'Inizio', ['class' => 'col-sm-2 col-form-label', 'for' => 'start-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('start-date', \Carbon\Carbon::now(), ['value' => old('start-date'), 'class' => 'form-control ms-4']) }}
                </div>
            </div>

            <div class="form-outline row ms-5 mb-4 mt-4 pe-3 w-25">
                {{ Form::label('end-date', 'Fine', ['class' => 'col-sm-2 col-form-label', 'for' => 'end-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('end-date', \Carbon\Carbon::now(), ['value' => old('end-date'), 'class' => 'form-control ms-4']) }}
                </div>
            </div>
            
            <div class="text-center col pt-2 ps-4">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2']) }}
            </div>
        </div>
    </div>
</section> 
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach( $accomodations as $accomodation)    
                @include('components.card', [ 'accomodation' => $accomodation ] )
            @endforeach 
        </div>
    </div>
</div>

<div class="py-5 text-center container">  
   <a href="{{ route('login') }}"> Altri Risultati </a>
</div>

@endsection
