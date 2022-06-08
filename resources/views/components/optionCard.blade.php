<div class="card m-2 shadow-sm">
	<div class="card-header">
		Opzionamento dell'utente <a href="">#{{$messaggio->id_mittente}}</a>
	</div>
	<div class="card-body">
		<p class="card-text">{{$messaggio->testo}}</p>
		<div class="mt-2">
		@if ($alloggio->confermato==false)
			{{ Form::open(array('route' => array('lore.accom.option.confirm'), 'id' => 'confirmOption','files' => false, 'class'=> 'form-inline d-flex mt-2')) }}
			{{ Form::submit('Conferma', ['class' => 'btn btn-primary m-1']) }}
			<input type="hidden" name="id_opzione" value="{{ $messaggio->id }}" readonly="readonly"/>
			{{ Form::close() }}
		@endif
                </div>   
	</div>
	<div class="card-footer">
		<small>{{$messaggio->created_at}}</small>
	</div>
</div>
