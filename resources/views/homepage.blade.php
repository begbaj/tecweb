@extends('layouts.base')

@section('title', 'Homepage')


@section('scripts')
<script>
</script>
@endsection
@section('content')

@php

 $files = glob('img/stock-images' . '/*.jpg');
 $rand_keys = array_rand($files, 3);

 $file_1 = $files[$rand_keys[0]];
 $file_2= $files[$rand_keys[1]];
 $file_3 = $files[$rand_keys[2]];

@endphp

<!-- Carousel (slideshow) -->
<div class="container" >
    <div id="slideshow" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner rounded" style="max-height: 500px;">
            <div class="carousel-item active">
                <img class="d-block w-100 carousel-crop" src="{{$file_1}}" alt="First slide">
                <div class="carousel-caption carousel-great-text d-none d-md-block">
                    <h1>Cerca gli alloggi pi&ugrave; vicini alla tua facolt&aacute;</h1>
                    <p>Con il nostro sistema di ricerca puoi trovare gli alloggi e i posti letto nella citt&aacute; che ti interessa </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-crop " src="{{$file_2}}" alt="Second slide">
                <div class="carousel-caption carousel-great-text d-none d-md-block">
                    <h1>Metti in affitto un posto letto o un appartamento!</h1>
                    <p>Hai una casa o un letto da mettere in affitto? Con Kumuuzag puoi!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-crop" src="{{$file_3}}" alt="Third slide">
                <div class="carousel-caption carousel-great-text d-none d-md-block">
                    <h1>Cerca gli alloggi pi&ugrave; vicini alla tua facolt&aacute;</h1>
                    <p>Con il nostro sistema di ricerca puoi trovare gli alloggi e i posti letto nella citt&aacute; che ti interessa </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Text Cloud -->
<section class="jumbotron text-center cloud-container-lg my-5 p-5">
    <div class="container">
        <h1 class="jumbotron-heading">Kumuuzag é fatto per gli studenti</h1>
        <p class="lead text-muted">Con Kumuuzag la tua vita sarà finalmente semplice:
        cerca un appartamento per te e i tuoi amici oppure trova un posto letto disponibile
        nelle vicinanze della tua Università!</p>
    </div>
</section>

<!-- Array -->
<div class="container my-5 py-2">
    <div class="d-flex flex-nowrap overflow-hidden">
    @isset($accomodations)
        @foreach ($accomodations as $accomodation)
            @include('components/accomodationCard', [ 'accomodations' => $accomodation ] )
        @endforeach 
    @endisset()
    </div>
    <a href="{{ route('catalog') }}" style="text-decoration: none;"> <p class="text-center mt-2 fs-2">Vai al catalogo</p></a>
</div>
<!-- Registrati -->
<div class="container my-5">
    <p class="fs-1 text-center"> Registrati! </p>
    <div class="row align-items-start">    
        <a href="{{ route('register', ['type' => 'locatore']) }}" class="col cloud-btn-lg btn mt-2 me-2">
            <p class="fs-2">Locatore </p> 
            <ul>
                <li>Metti in affito il tuo alloggio</li>
                <li>Gestisci le tue inserzioni</li>
                <li>Rispondi ai clienti interessati</li>
            </ul>
        </a>
   
        <a href="{{ route('register',['type' => 'locatario']) }}" class="col cloud-btn-lg btn mt-2 me-2">
            <p class="fs-2">Locatario</p>
            <ul>
                <li>Trova l'alloggio che fa al caso tuo</li>
                <li>Gestisci le tue prenotazioni</li>
                <li>Contatta i locatori</li>
            </ul>
        </a>
    </div>
</div>
<!-- Aiuto -->
<div class="container cloud-container-lg p-5 mt-5">
    <div class="row">
        <div class="col row-cols-1">
            <div class="col" >
                <p class="fs-1">Hai delle domande?</p>
            </div>
            <div class="col row" style="margin-top: 10em;">
                <a href="{{ route('faq') }}" class="col align-self-end btn btn-secondary mt-1 me-2 ms-2">Vai alle FAQs</a>
                <a href="mailto:kumuuzag@gmail.com?Subject=Help%20request" target="_top" class="col mt-1 align-self-end btn btn-secondary me-2 ms-2">Contattaci</a>
            </div>
        </div>
        <div class="col">
            <center>
                <img src="img/brand/logo.png" class="img-fluid" style="height: 300px;">
            </center>
        </div>
    </div>
</div>
@endsection
