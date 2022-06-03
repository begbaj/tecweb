@extends('layouts.base')

@section('title', 'Area Amministratore')

@section('content')
<div class="static text-center">
    <p>Benvenuto {{ Auth::user()->username }}!</p>
</div>

<div class="container-fluid">
    @foreach ($accomodations->chunk(3) as $chunk)
            <div class="card-group">
                @foreach ($chunk as $accomodation)    
                    @include ('components.card', [ 'accomodation' => $accomodation ] )
                @endforeach 
            </div>
    @endforeach 
</div>

<div class="container d-flex justify-content-center mt-5">
	{{$accomodations->onEachSide(2)->links()}}
</div>
@endsection
