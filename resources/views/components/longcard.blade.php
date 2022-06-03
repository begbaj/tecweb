{{-- Long Card: long card used to show a list of accomodations--}}
<div class="card mb-3" style="max-width: 50em;">
  <div class="row g-0">
    <div class="col-md-4">
      <img class="img-fluid rounded-start card-img" src="{{ asset('assets/'. $accomodation->id . '/thumbnail')}} " alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> {{ $accomodation->titolo }} </h5>
        <p class="card-text"> {{ $accomodation->descrizione }} </p>
        <p class="card-text"> Creato il: {{ $accomodation->created_at}} </p>
        <p class="card-text"><small class='text-muted'>
        @if ($accomodation->updated_at != null)
             Ultimo aggiornamento: {{ $accomodation->updated_at}}
        @else
            Alloggio mai aggiornato
        @endif
        </small></p>
        <div class='row'>
            <button class="btn btn-secondary col mx-2">Modifica</button>
            <button class="btn btn-danger col mx-2">Elimina</button>
            <button class="btn btn-primary col mx-2">Visualizza</button>
        </div>
      </div>
    </div>
  </div>
</div>
