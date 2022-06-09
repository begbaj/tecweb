<div class="card ms-2 me-2" style="width: 18rem;">
    <img src="{{ URL::asset('assets/' . $accomodation->id . '/thumbnail') }}" style="height: 200px" class="card-img-top" alt="Immagine Prova">
    <div class="card-body">
        <h5 class="card-title text-truncate"> {{ $accomodation->titolo  }}</h5>
        <p class="card-text"> {{ $accomodation->created_at }} </p>
    </div>
    <div class="card-footer">
        <a href="{{ route('login') }}" class="btn btn-primary">Vedi dettagli</a>
    </div>
</div>
