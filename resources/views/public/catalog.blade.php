@extends('layouts.public')

@push('head')
@endpush

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

@if (!auth()->user('admin'))    
<div class="container-fluid">
@foreach($accomodations->chunk(3) as $chunk)
	<div class="card-group">
            @foreach($chunk as $accomodation)    
                @include('components.card', [ 'accomodation' => $accomodation ] )
            @endforeach 
	</div>
@endforeach 
</div>

<div class="container d-flex justify-content-center mt-5">
	{{$accomodations->onEachSide(2)->links()}}
</div>
@endif
@endsection
