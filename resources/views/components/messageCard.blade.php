<div class="row">
@if (Auth::id() == $messaggio->id_mittente)
<div class="col-12 d-flex justify-content-end">
<div class="card text-right float-right mw-25 m-2 shadow-sm bg-primary text-white align-self-end" data-mdb-ripple-color="light">
@else
<div class="col-12 d-flex justify-content-start">
<div class="card m-2 mw-25 shadow-sm" data-mdb-ripple-color="light">
@endif
  <div class="card-body" data-mdb-ripple-color="light">
        <p class="card-text"><small>{{ $messaggio->testo }}</small></p>
    </div>
<div class="card-footer text-right">
@if (Auth::id() == $messaggio->id_mittente)
<small>{{$messaggio->created_at}}</small>
@else
<small class="text-muted">{{$messaggio->created_at}}</small>
@endif
</div>
</div>
</div>
  </div>
