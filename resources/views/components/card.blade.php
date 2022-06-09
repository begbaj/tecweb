{{-- CARD: basic accomodation card --}}
<div class="card m-2 shadow-sm"  style="max-width:32%">
    <img class="card-img-top overflow-hidden" style="height: 300px" src="{{ asset('assets/'. $accomodation->id . '/thumbnail')}} ">
    <div class="card-body">
        @if($accomodation->confermato == 1)
            <h5 class="card-text text-truncate text-danger">AFFITTATO</h5>    
        @endif
        <h5 class="card-title text-truncate">{{ $accomodation->titolo }}</h5>
        <p class="card-text">{{substr($accomodation->descrizione,0 , 150) }}</p>
	<p class="card-text text-muted float-start mw-50">{{ucwords(str_replace('_', ' ', $accomodation->tipo))}}</p>
	<p class="card-text text-muted float-end">{{$accomodation->citta}}</p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        @if (Auth::check() && (auth()->user()->hasRole('locatario') or auth()->user()->hasRole('locatore')))
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('catalog.accom.details', [$accomodation->id]) }}"> Vedi dettagli</a>
            </div>
        @else    
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('login') }}"> Vedi dettagli </a>
            </div>
        @endif
            <small class="text-muted">{{ $accomodation->created_at }}</small>
    </div>
  </div>
