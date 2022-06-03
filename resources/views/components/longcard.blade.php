
{{-- Long Card: long card used to show a list of accomodations--}}

<div class="card bg-dark text-dark" >
    <a href="{{ route('catalog.accom.details', [$accomodation->id]) }}">
      <img class="card-img w-100" style="height: 200px;" src="{{ asset('assets/'. $accomodation->id . '/thumbnail')}} " alt="">
      <div class="card-img-overlay">
        <h5 class="card-title bg-white"> {{ $accomodation->titolo }} </h5>
        <p class="card-text bg-white"> {{ $accomodation->descrizone }} </p>
        <p class="card-text bg-white"> Creato il {{ $accomodation->created_at}} </p>
        @if ($accomodation->updated_at != null)
            <p class="card-text bg-white">Ultimo aggiornamento: {{ $accomodation->updated_at}} </p>
        @else
            <p class="card-text"> Alloggio mai aggiornato </p>
            {{-- <p class="card-text"> {{ __('neverUpdated') }} </p> --}}
        @endif
      </div>
    </a>
</div>
