@extends('layouts.base')

@push('head')
@endpush

@section('title', 'Catalogo')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
        $(document).ready(function () {
                cards = document.getElementsByClassName('card-text');

                for(i=0; i< cards.length; i++){
                        cards[i].innerHTML = truncateText(cards[i].innerHTML, 120);
                }

                cards = document.getElementsByClassName('card-text text-muted float-end')

                for(i=0; i< cards.length; i++){
                        cards[i].innerHTML = truncateText(cards[i].innerHTML, 30);
                }
        })

        function truncateText(text, max_char){
                if(text.length <= max_char){
                        return text;
                }
                return  text.slice(0,max_char-2) + '...';
        }
</script>
@endsection


@section('content') 
<section class="py-5 container">
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
        @guest
            <p class="lead text-muted text-center"> <a id="registrazione" href=" {{ route('register') }} "> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
        @endguest
    </div>
</div> 

<div class="container align-content-center">
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
