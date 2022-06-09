{{-- Long Card: long card used to show a list of accomodations--}}
<div class="card m-5">
    <div class="row g-0">
       <div class="col-md-4 overflow-hidden" style="height: 15em;" >
          <img class="card-img" src="{{ asset('assets/'. $accomodation->id . '/thumbnail')}}">
       </div>
       <div class="col-md-8">
          <div class="card-body">
             <h5 class="card-title"> {{ $accomodation->titolo }} </h5>
             <p class="card-text"> {{ substr($accomodation->descrizione, 0, 150) }} </p>
             <p class="card-text"> Creato il: {{ $accomodation->created_at}} </p>
             <p class="card-text">
		@if (auth()->user()->hasRole('locatore'))
                <small class='text-muted'> @if ($accomodation->updated_at != null) Ultimo aggiornamento: {{ $accomodation->updated_at}} @else Alloggio mai aggiornato @endif </small>
		@endif
             </p>
          </div>
       </div>
    </div>
    <div class="row g-0 bg-light rounded border py-3 px-2 justify-content-start"> 
        <div class="col-4">
            <a class="d-flex btn btn-primary me-2" href="{{ route('catalog.accom.details', [$accomodation->id]) }}">Visualizza</a>
        </div>
	@if (auth()->user()->hasRole('locatore'))
        <div class="col-5">
            @if ($accomodation->confermato == true)
            <a class=" btn btn-secondary mx-2 disabled">Modifica</a>
            <button type="button" class="btn btn-danger mx-2 disabled">Già confermato</button>
            @else
            <a class=" btn btn-secondary mx-2" href="{{ Route('lore.accom.edit', [$accomodation->id])}}">Modifica</a>
            <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#delete-{{$accomodation->id}}">Elimina</button>
            <div class=" modal fade" id="delete-{{$accomodation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Elimina Alloggio {{$accomodation->titolo}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body"> Confermi di voler procedere con l'eliminazione? </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <a type="button" href='{{ route("lore.accom.delete", ["id" => $accomodation->id]) }}' class="btn btn-primary">Confermo</a>
                     </div>
                  </div>
               </div>
            </div>
            @endif
        </div>
	@endif
    </div>
</div>
