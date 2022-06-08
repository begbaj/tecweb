<div class="card m-2 shadow">
	<div class="card-header">
		Opzione dell'utente <a href="{{route('user.profile', [$messaggio->id_mittente])}}">#{{$messaggio->id_mittente}}</a>
	</div>
	<div class="card-body">
		<p class="card-text">{{$messaggio->testo}}</p>
		<div class="mt-2">
		@if ($alloggio->confermato==false)
			{{ Form::open(array('route' => array('lore.accom.option.confirm'), 'id' => 'confirmOption','files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
			{{ Form::submit('Conferma', ['class' => 'btn btn-primary m-1']) }}
			<input type="hidden" name="id_opzione" value="{{ $messaggio->id }}" readonly="readonly"/>
			{{ Form::close() }}
		@elseif (!is_null($messaggio->data_conferma_opzione))
			<a href="{{route('chat.contract',[$messaggio->id_alloggio, $messaggio->id_mittente])}}">Vedi contratto</a>
		@endif
                </div>   
	</div>
	<div class="card-footer">
		<small>{{$messaggio->created_at}}</small>
	</div>
</div>
