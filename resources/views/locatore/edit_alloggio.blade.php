@extends('layouts.base')

@section('title', 'Modifica Alloggio')

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
$(function () {
    $("#tipo").on('change', function(event) {
       $.ajax({
           type:'GET',
           url: '{{ route("api.servs") }}/' + $("#tipo").val(),
           data:'_token = <?php echo csrf_token(); ?>',
           success:updateServs
        });
       if ( $("#tipo").val() == "posto_letto" ){
            $("#camere").prop('readonly', true);
            $("#camere").val(1);
       }
       else{
            $("#camere").prop('readonly', false);
       }
    });
    $('#tipo').change();


    $("#eta_min").on("change", function(event) {
        if ($("#eta_min").val() >= 18){
            $("#eta_max").prop("disabled", false);
        }else{
            $("#eta_max").prop("disabled", true);
        }
    });
    $("#eta_min").change();

    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom auto',
        autoclose: true,
        todayHighlight: true,
        datesDisabled: ['06/06/2022', '06/21/2022']
    });
});

function updateServs(data){
    $('#servizi').find('*').remove();
    $('#vicino').find('*').remove();
    var servs = <?php if(null != $servizi) print_r(json_encode($servizi)); else echo 'null'; ?>;
    $.each(data, function (key, val) {
        var element = '<div class="form-check">' +
            '<input name="servizi[]" class="form-check-input" type="checkbox" value="' + val.id + '" id="' + val.id + '"';
        if (servs != null && servs.includes(val.id)){
            element += ' checked ';
        }
        element += '><label class="form-check-label" for="' + val.id + '">' + val.nome.replace(/vicino_/, '').replace(/_/g, ' ') + '</label></div>';
        if (val.nome.includes('vicino_')) $('#vicino').append(element);
        else $('#servizi').append(element);
    });
}
</script>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
{{ Form::open(['route' => 'lore.accom.edit.confirm', 'id' => 'newaccom-form', 'files' => true]) }}
{{ Form::token() }}
<div class='row'>
    <div class="col mb-3">
        {{ Form::label('titolo', 'Titolo', ['class' => ' col-form-label',  'for'=>'titolo']) }}
        {{ Form::text('titolo', $alloggio->titolo, ['class' => 'form-control'] )}}
        @if ($errors->first('titolo'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('titolo') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        {{ Form::label('tipo', 'Tipo', ['class' => ' col-form-label',  'for'=>'tipo']) }}
        {{ Form::select('tipo', ['appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"], $alloggio->tipo, ['class' => 'form-control'] )}}
        @if ($errors->first('tipo'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('tipo') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

    <div class="col mb-3">
        {{ Form::label('eta_min', 'Età minima', ['class' => ' col-form-label',  'for'=>'etamin']) }}
        {{ Form::number('eta_min', $alloggio->eta_min, ['class' => 'form-control']) }}
        @if ($errors->first('eta_min'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('eta_min') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
    <div class="col mb-3">
        {{ Form::label('eta_max', 'Età massima', ['class' => ' col-form-label',  'for'=>'etamax']) }}
        {{ Form::number('eta_max', $alloggio->eta_max,['class' => 'form-control'] ) }}
        @if ($errors->first('eta_max'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('eta_max') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

    <div class="col mb-3">
        {{ Form::label('sesso', 'Preferenza di genere', ['class' => ' col-form-label',  'for'=>'gender']) }}
        {{ Form::select('sesso', ['' => 'Nessuna Preferenza', 'm' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], $alloggio->sesso, ['class' => 'form-control'] )}}
        @if ($errors->first('sesso'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('sesso') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

</div>

<div class="row">
    <div class="col mb-3">
        {{ Form::label('prezzo', 'Canone (€/mese)', ['class' => ' col-form-label',  'for'=>'price']) }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
            </div>
            {{ Form::number('prezzo', $alloggio->prezzo, ['class' => 'form-control']) }}
        </div>
        @if ($errors->first('prezzo'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('prezzo') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
    <div class="col mb-3">
        {{ Form::label('superficie', 'Superficie (mq)', ['class' => ' col-form-label',  'for'=>'surface']) }}
        {{ Form::number('superficie', $alloggio->superficie, ['class' => 'form-control']) }}
        @if ($errors->first('superficie'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('superficie') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
        <div class="col mb-3">
            <div class='row'>
                {{ Form::label('range_data', 'Date disponibilità', ['class' => ' col-form-label',  'for'=>'data_min data_max']) }}
                <div class="input-daterange input-group" id="datepicker">
                    <span class="input-group-text"> dal </span>
                    {{ Form::text('data_min', substr($alloggio->data_min, 0, -8), ['class' => 'input-sm form-control']) }}
                    <span class="input-group-text"> al </span>
                    {{ Form::text('data_max', substr($alloggio->data_max, 0, -8), ['class' => 'input-sm form-control']) }}
                </div>
            </div> 
        <div class="row"> 
            <div class="col">
                @if ($errors->first('data_min'))
                <div class="d-flex justify-content-center">
                    <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
                    @foreach ($errors->get('data_min') as $message)
                    <div class="justify-content-center">{{ $message }}</div>
                    @endforeach
                    </div>
                </div>     
                @endif
            </div>     
            <div class="col">
                @if ($errors->first('data_max'))
                <div class="d-flex justify-content-center">
                    <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
                    @foreach ($errors->get('data_max') as $message)
                    <div class="d-flex justify-content-center">{{ $message }}</div>
                    @endforeach
                    </div>
                </div>     
                @endif
            </div>     
        </div>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        {{ Form::label('provincia', 'Provincia', ['class' => ' col-form-label',  'for'=>'province']) }}
        {{ Form::text('provincia', $alloggio->provincia, ['class' => 'form-control'] )}}
        @if ($errors->first('provincia'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('provincia') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

    <div class="col mb-3">
        {{ Form::label('citta', 'Città', ['class' => ' col-form-label',  'for'=>'city']) }}
        {{ Form::text('citta', $alloggio->citta, ['class' => 'form-control'] )}}
        @if ($errors->first('citta'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('citta') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
    <div class="col mb-3">
        {{ Form::label('indirizzo', 'Indirizzo', ['class' => ' col-form-label',  'for'=>'address']) }}
        {{ Form::text('indirizzo', $alloggio->indirizzo, ['class' => 'form-control'] )}}
        @if ($errors->first('indirizzo'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('indirizzo') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

    <div class="col mb-3">
        {{ Form::label('cap', 'CAP', ['class' => ' col-form-label',  'for'=>'cap']) }}
        {{ Form::text('cap', $alloggio->cap, ['class' => 'form-control'] )}}
        @if ($errors->first('cap'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('cap') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        {{ Form::label('posti_letto', 'Posti Letto', ['class' => ' col-form-label',  'for'=>'bedrooms']) }}
        {{ Form::number('posti_letto', $alloggio->posti_letto, ['class' => 'form-control'] ) }}
        @if ($errors->first('posti_letto'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('posti_letto') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

    <div class="col mb-3">
        {{ Form::label('camere', 'Camere', ['class' => ' col-form-label',  'for'=>'bedrooms']) }}
        {{ Form::number('camere', $alloggio->camere, ['class' => 'form-control'] ) }}
        @if ($errors->first('camere'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('camere') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        {{ Form::label('servizi', 'Servizi', ['class' => ' col-form-label',  'for'=>'servizi']) }}
        <div id="servizi">
        </div>
    </div>
    <div class="col mb-3">
        {{ Form::label('vicino', 'Vicino A', ['class' => ' col-form-label',  'for'=>'servizi']) }}
        <div id="vicino">
        </div>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        {{ Form::label('foto', '', ['class' => ' col-form-label',  'for'=>'bedrooms']) }}
        {{ Form::file('image') }}
        @if ($errors->first('image'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('image') as $message)
            <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
        <div class="container-fluid d-flex justify-content-center border border-secondary rounded mt-2 pb-2 pt-2 pe-2 ps-2">
            <img src="{{ URL::asset('assets/'. $alloggio->id . '/thumbnail') }}" style="height: 250px" class="img-fluid w-100">
        </div>
    </div>
    <div class="col mb-3">
        {{ Form::label('descrizione', 'Descrizione', ['class' => ' col-form-label',  'for'=>'desc']) }}
        {{ Form::textarea('descrizione', $alloggio->descrizione, ['class' => 'form-control mt-2'] )}}
        @if ($errors->first('descrizione'))
        <div class="d-flex justify-content-center">
            <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
            @foreach ($errors->get('descrizione') as $message)
                <div class="d-flex justify-content-center">{{ $message }}</div>
            @endforeach
            </div>
        </div>     
        @endif
    </div>
</div>

<div class='d-flex justify-content-end'>
    {{ Form::submit("Conferma Modifiche", ['class' => 'btn btn-success']) }}
    <a class="btn btn-danger ms-3" href=" {{ route('lore') }}">Annulla</a>
</div>

{{ Form::close() }}

@endsection