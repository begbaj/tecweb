<div class="card m-2 shadow-sm">

    <img class="card-img-top" src="@php
    try{
        $allFiles = Storage::get('public/assets/'.$accomodation->id .'/');

        $matchingFiles = preg_grep('/^1\./', $allFiles);
        if (count($matchingFiles) > 0){
            echo Storage::get($matchingFiles[0]);
        }else{
            echo 'not_found';
        }
    }catch (Exception $e) {
        echo 'error';
    }
    @endphp
    ">
    <div class="card-body">
        <h5 class="card-title text-truncate">{{ $accomodation->titolo }}</h5>
        <p class="card-text"> {{ $accomodation->descrizione }} </p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('login') }}"> Vedi dettagli </a>
            </div>
            <small class="text-muted">{{ $accomodation->created_at }}</small>
    </div>
  </div>
