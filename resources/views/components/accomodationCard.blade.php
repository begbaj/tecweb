
<div class="card ms-2 me-2" style="width: 18rem;">
    <img src="{{ URL::asset('assets/' . $accomodation->id . '/1.jpg') }}" class="card-img-top" alt="Immagine Prova">
    <div class="card-body">
        <h5 class="card-title"> {{ $accomodation->titolo  }}</h5>
        <p class="card-text"> {{ $accomodation->created_at }} </p>
        <a href="{{ route('catalog') }}" class="btn btn-primary">Vedi dettagli</a>
    </div>
</div>
