<div class="card m-2 shadow-sm">

    <img class="card-img-top" src="{{ asset('assets/'. $accomodation->id . '/thumbnail')}} ">
    <div class="card-body">
        <h5 class="card-title text-truncate">{{ $accomodation->titolo }}</h5>
        <p class="card-text"> {{ $accomodation->descrizione }} </p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        @if (Auth::check() && auth()->user()->hasRole('locatario'))
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('detailsLocatario', [$accomodation->id]) }}"> Vedi dettagli</a>
            </div>
        @elseif (Auth::check() && auth()->user()->hasRole('locatore'))
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('detailsLocatore', [$accomodation->id]) }}"> Vedi dettagli</a>
            </div>
        @else    
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('login') }}"> Vedi dettagli </a>
            </div>
        @endif
            <small class="text-muted">{{ $accomodation->created_at }}</small>
    </div>
  </div>
