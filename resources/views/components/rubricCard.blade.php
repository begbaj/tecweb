<div class="card hoverable m-2 shadow-sm">

@if (auth()->user()->hasRole('locatario'))
    <a class="card-block text-decoration-none" href="{{ route('chat', [$user->id]) }}">
@elseif (auth()->user()->hasRole('locatore'))
    <a class="card-block text-decoration-none" href="{{ route('chat', [$user->id]) }}">
@endif
    <div class="card-body hover-overlay" data-mdb-ripple-color="light">
        <h5><a class="card-title" href="{{ route('user.profile', [$user->id]) }}">{{ $user->nome." ".$user->cognome}} </a></h5>
        <p class="card-text text-muted"><small>{{$user->max}}</small></p>
    </div>
<div class="card-footer text-center p-0">
@if (auth()->user()->hasRole('locatario'))
    <a class="btn btn-primary btn-block w-100" href="{{ route('chat', [$user->id]) }}">Vedi chat</a>
@elseif (auth()->user()->hasRole('locatore'))
    <a class="btn btn-primary btn-block w-100" href="{{ route('chat', [$user->id]) }}">Vedi chat</a>
@endif
</div>
</a>
</div>
