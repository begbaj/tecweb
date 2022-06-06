<div class="row">
	@if (Auth::id() == $messaggio->id_mittente)
	<div class="col-12 d-flex justify-content-end">
		@if(is_null($messaggio->id_alloggio))
		<div class="card text-right float-right m-2 shadow-sm bg-primary text-white align-self-end" style="max-width:75%">
		@else
		<div class="card text-right float-right m-2 shadow-sm bg-success text-white align-self-end" style="max-width:75%">
			<div class="card-header">Opzionamento per l'alloggio <a href="{{ route('catalog.accom.details', [$messaggio->id_alloggio]) }}" class="link-warning">{{$messaggio->id_alloggio}}</a></div>
		@endif
	@else
	<div class="col-12 d-flex justify-content-start">
		@if (is_null($messaggio->id_alloggio))
		<div class="card m-2 mw-25 shadow-sm" style="max-width:75%">
		@else
		<div class="card m-2 mw-25 shadow-sm bg-success text-white" style="max-width:75%">
			<div class="card-header">Opzionamento per l'alloggio <a href="{{ route('catalog.accom.details', [$messaggio->id_alloggio]) }}" class="link-warning">{{$messaggio->id_alloggio}}</a></div>
		@endif
	@endif
			<div class="card-body" data-mdb-ripple-color="light">
				<p class="card-text"><small>{{ $messaggio->testo }}</small></p>
                                @if (Auth::id() == $messaggio->id_mittente AND !is_null($messaggio->id_alloggio))
                                <div class="mt-2"><p><strong>In attesa di conferma o rifiuto...</strong></a></div>
                                @elseif(Auth::id() == $messaggio->id_destinatario AND !is_null($messaggio->id_alloggio))
                                <div class="mt-2">
                                    <a class="btn btn-success border-light" href="">Conferma Richiesta</a>
                                    <a class="btn btn-danger border-light ms-2" href="">Rifiuta Richiesta</a>
                                </div>   
                                @endif
			</div>
			<div class="card-footer text-right">
				@if (!is_null($messaggio->id_alloggio) OR (is_null($messaggio->id_alloggio) AND Auth::id() == $messaggio->id_mittente))
				<small>{{$messaggio->created_at}}</small>
				@else
				<small class="text-muted">{{$messaggio->created_at}}</small>
				@endif
			</div>
		</div>
	</div>
</div>
