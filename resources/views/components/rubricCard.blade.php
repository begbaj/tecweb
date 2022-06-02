<div class="card m-2 shadow-sm hover-overlay" data-mdb-ripple-color="light">

@if (auth()->user()->hasRole('locatario'))
    <a class="card-block stretched-link text-decoration-none" href="{{ route('chat', [$user->id]) }}">
@elseif (auth()->user()->hasRole('locatore'))
    <a class="card-block stretched-link text-decoration-none" href="{{ route('chat', [$user->id]) }}">
@endif
    <div class="card-body hover-overlay" data-mdb-ripple-color="light">
        <h5 class="card-title text-truncate">{{ $user->nome." ".$user->cognome}}</h5>
        <p class="card-text text-muted"><small>{{$user->max}}</small></p>
    </div>
<div class="card-footer text-center p-0">
@if (auth()->user()->hasRole('locatario'))
    <a class="btn btn-primary btn-block w-100" href="{{ route('chat', [$user->id]) }}">Vedi chat</a>
@elseif(auth()->user()->hasRole('locatore'))
    <a class="btn btn-primary btn-block w-100" href="{{ route('chat', [$user->id]) }}">Vedi chat</a>
@endif
</div>
</a>
</div>
