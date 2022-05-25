@extends('layouts.admin')

@section('title', 'Area Amministratore')

@section('content')
<div class="static text-center">
    <p>Benvenuto {{ Auth::user()->username }}!</p>
</div>
<div class="container py-2 bg-light">
    <div class="row overflow-hidden d-flex flex-row flex-nowrap">
    @isset($accomodations)
        @foreach ($accomodations as $accomodation)
            @include('components/accomodationCard', [ 'accomodations' => $accomodation ] )
        @endforeach 
    @endisset()
    </div>
</div>
@endsection