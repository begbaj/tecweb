<div class="card m-2 shadow-sm">

    <img class="card-img-top" src="{{ URL::asset('assets/' . $accomodation->id . '/1.jpg') }}">
    <div class="card-body">
        <h5 class="card-title text-truncate">{{ $accomodation->titolo }}</h5>
        <p class="card-text"> {{ $accomodation->descrizione }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('login') }}"> Vedi dettagli </a>
            </div>
            <small class="text-muted">{{ $accomodation->created_at }}</small>
        </div>
    </div>
  </div>
