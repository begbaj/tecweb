@extends('layouts.public')

@section('title', 'Catalogo')

@section('content') 
<section class="py-5 container">
@if (!auth()->user('admin')&&!auth()->user('locatore')&&!auth()->user('locatario'))
<div class="row py-lg-5">
 <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
<p class="lead text-muted text-center"> <a id="registrazione" href="{{ route('register') }}"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
 </div>
</div> 
 @endif

@if (auth()->user('admin'))
{{Form::open(array('route' => 'stats', 'id' => 'filter-form', 'files' => false, 'method'=>'GET' )) }}
    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                {{ Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type']) }}
                <div class="col-sm-10 ps-3">
                {{ Form::select('type', ['appartamento' => "appartamento", 'posto-letto' => "posto letto"], old("type"), ['class' => 'form-control ms-5']) }}
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                {{ Form::label('start-date', 'Inizio', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('start-date', "", ['value' => old('start-date'), 'class' => 'form-control ms-6']) }}
                </div>
            </div>

            <div class="form-outline row ms-3 mb-4 mt-4 w-25">
                {{ Form::label('end-date', 'Fine', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('end-date', "", ['value' => old('end-date'), 'class' => 'form-control ms-6']) }}
                </div>
            </div>
            <div class="text-center col pt-2 ps-4">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5']) }}
            </div>
        </div>
    </div> 
    {{Form::close()}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach( $accomodations as $accomodation)    
                @include('components.card', [ 'accomodation' => $accomodation ] )
            @endforeach 
        </div>
@endif
  
    
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
	<div class="container d-flex justify-content-center">
		{{$accomodations->links()}}
	</div>
</div>

@endsection
