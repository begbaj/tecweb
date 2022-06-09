@extends('layouts.base')

@section('title', 'Modifica Alloggio')

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
$(function () {
    $("#titolo").prop('maxlength','100');      
    $("#capp").prop('maxlength','5');  
    $("#beds").prop('maxlength','5');
    $("#bedrooms").prop('maxlength','5');
    $("#price").prop('maxlength','8');
    $("#sup").prop('maxlength','4');
    $("#beds").prop('maxlength','3');
    $("#bedrooms").prop('maxlength','3');
    $("#desc").prop('maxlength','5000');  

    

    $('#titolo').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#etaminim').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#etamaxim').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });    
    
    $('#price').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9.]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#sup').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9.]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#prov').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#cit').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });

    $('#addr').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#capp').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#beds').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });    
    
    $('#bedrooms').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#desc').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    
    
    $("#tipo").on('change', function(event) {
       $.ajax({
           type:'GET',
           url: '{{ route("api.servs") }}/' + $("#tipo").val(),
           data:'_token = <?php echo csrf_token(); ?>',
           success:updateServs
        });
       showPerFields();
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
        orientation: 'bottom',
        autoclose: true,
        todayHighlight: true
    });
});


function showPerFields(){;
    var tipo = $("#tipo");
    var allApp = $(".appartamento");
    var allLet = $(".letto");

    if ( tipo.val() == "posto_letto" ){
        allApp.prop('disabled', true);
        allApp.hide();
        allLet.prop('disabled', false);
        allLet.show();
    }
    else{
        allLet.prop('disabled', true);
        allLet.hide();
        allApp.prop('disabled', false);
        allApp.show();
    }
}


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
        {{ Form::text('titolo', $alloggio->titolo, ['id' =>'titolo', 'class' => 'form-control'] )}}
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
        {{ Form::select('tipo', ['appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"], $alloggio->tipo, ['class' => 'form-control', 'id'=>'tipo'] )}}
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
        {{ Form::text('eta_min', $alloggio->eta_min, ['id' =>'etaminim', 'class' => 'form-control']) }}
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
        {{ Form::text('eta_max', $alloggio->eta_max,['id' =>'etamaxim', 'class' => 'form-control'] ) }}
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
            {{ Form::text('prezzo', $alloggio->prezzo, ['id' =>'price', 'class' => 'form-control']) }}
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
        {{ Form::text('superficie', $alloggio->superficie, ['id' =>'sup', 'class' => 'form-control']) }}
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
                    {{ Form::text('data_min', $alloggio->data_min, ['class' => 'input-sm form-control']) }}
                    <span class="input-group-text"> al </span>
                    {{ Form::text('data_max', $alloggio->data_max, ['class' => 'input-sm form-control']) }}
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
        {{ Form::text('provincia', $alloggio->provincia, ['id' =>'prov','class' => 'form-control'] )}}
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
        {{ Form::text('citta', $alloggio->citta, ['id' =>'cit', 'class' => 'form-control'] )}}
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
        {{ Form::text('indirizzo', $alloggio->indirizzo, ['id' =>'addr', 'class' => 'form-control'] )}}
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
        {{ Form::text('cap', $alloggio->cap, ['id' =>'capp', 'class' => 'form-control'] )}}
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
        <div class="more-fields appartamento col-1 input-group form-outline">
            <span class="input-group-text"> N. Letti </span>
            {{ Form::text('posti_letto', '1', ['class' => 'form-control', 'id' => 'beds'] ) }}
        </div>
        <div class="more-fields letto col-1 input-group form-outline">
            <span class="input-group-text"> N. Letti </span>
            {{ Form::select('posti_letto', ['1' => 'Camera Singola', '2'=> 'Camera Doppia'],'' ,['class' => 'form-control']) }}   
        </div>
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
        {{ Form::text('camere', $alloggio->camere, ['id' =>'bedrooms', 'class' => 'form-control'] ) }}
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
        <div class="rounded m-3">
            <div class="m-2">
                {{ Form::label('foto', '', ['class' => 'col-form-label',  'for'=>'bedrooms']) }}
                {{ Form::file('image', ['class' => 'form-control']) }}
            </div>
            @if ($errors->first('image'))
            <div class="d-flex justify-content-center">
                <div class="errors alert alert-danger d-flex  justify-content-center mt-3 pt-0 pb-0">
                @foreach ($errors->get('image') as $message)
                <div class="d-flex justify-content-center">{{ $message }}</div>
                @endforeach
                </div>
            </div>     
            @endif
            <img src="{{ URL::asset('assets/'. $alloggio->id . '/thumbnail') }}" style="max-height: 350px; max-width: 350px" class="img-fluid bg-white shadow rounded p-2">
        </div>
    </div>
    <div class="col mb-3">
        <div class="m-2">
        {{ Form::label('descrizione', 'Descrizione', ['class' => ' col-form-label',  'for'=>'desc']) }}
        {{ Form::textarea('descrizione', $alloggio->descrizione, ['id' =>'desc', 'class' => 'form-control mt-2'] )}}
        </div>
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
    <input name="id" value='{{ $alloggio->id }}' hidden readonly></input>
    {{ Form::submit("Conferma Modifiche", ['class' => 'btn btn-success']) }}
    <a class="btn btn-danger ms-3" href=" {{ route('lore') }}">Annulla</a>
</div>

{{ Form::close() }}

@endsection
