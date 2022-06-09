@extends('layouts.base')

@section('title', 'Area Locatario')

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/card-truncator.js') }}"></script>
<script type="text/javascript">
$(function () {
    $("#tipo").on('change', function(event) {
        var tipo = $("#tipo");
        var allApp = $(".appartamento");
        var allLet = $(".letto");

        allApp.prop('disabled', true);
        allLet.prop('disabled', true);
        allApp.hide();
        allLet.hide();

        $.ajax({
           type:'GET',
           url: '{{ route("api.servs") }}/' + $("#tipo").val(),
           data:'_token = <?php echo csrf_token(); ?>',
           success:updateServs
        });

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
    });
    $('#tipo').trigger('change');

    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom auto',
        autoclose: true,
        todayHighlight: true,
    });
    
    $('.more-fields').hide();
    $(".fields-container").animate({height: '0px'});
});    

function updateServs(data){
    var servspick = $('#servizi');
    var nearpick = $('#vicino');
    var allservs = $(".servs");
    
    allservs.find('option').remove();

    $.each(data, function (key, val) {
        var element = '<option value="' + val.id + '">' + val.nome.replace(/vicino_/, '').replace(/_/g, ' ') + '</option>';
        if (val.nome.includes('vicino_')){
            nearpick.append(element);
        }
        else{
            servspick.append(element);
        }
    });
    // selezione multipla senza ctrl
   $('.remove-me').mousedown(function(e) {
        e.preventDefault();
        var originalScrollTop = $(this).parent().scrollTop();
        console.log(originalScrollTop);
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        var self = this;
        $(this).parent().focus();
        setTimeout(function() {
            $(self).parent().scrollTop(originalScrollTop);
        }, 0);
    return false;
   });
}

function showFields(){
    var fields = $(".more-fields");
    var fields_container = $(".fields-container");
    if(fields.is(':hidden')){
        fields.show();
        fields_container.animate({height: '300px'});
    }else{
        fields_container.animate({height: '0px'}, 'slow');
        fields.hide();
    }
}
</script>
@endsection

@section('style')

<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@endsection

@section('content')
    <div class='container'> <!-- FORM -->
        {{ Form::open(array('route' => [ 'lario.search' ], 'method' => 'GET', 'id' => 'filter-form', 'files' => false )) }}
        <div class="d-flex justify-content-center align-items-center row rounded-pill shadow p-3">
            <div class="col-sm-3 mx-2">
                {{ Form::text('luogo', '', ['value' => old("luogo"), 'placeholder'=> 'Luogo(Citta, Provincia, ...)', 'class' => 'form-control ms-4']) }}
            </div>
            <div class="col-sm-4 mx-2">
                <div class="input-group input-daterange" id="datepicker">
                    <span class="input-group-text"> dal </span>
                    {{ Form::text('data_min', '', ['placeholder' => 'inizio soggiorno', 'class' => 'form-control input-lg']) }}
                    <span class="input-group-text"> al </span>
                    {{ Form::text('data_max', '', ['placeholder' => 'fine soggiorno', 'class' => 'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-sm-2 mx-2 ">
                {{ Form::select('tipo', [''=>'Tutto', 'appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"], old('tipo') , ['id'=> 'tipo', 'class' => 'input-sm form-control']) }}
            </div>
            <div class="col-sm-1 mx-2">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary']) }}
            </div>
            <div class="col-sm-1 mx-2"><div class="btn btn-secondary" onclick="showFields()">+</div></div>
        </div>

        <div class="fields-container row">
            <div class="more-fields col row bg-light rounded shadow p-2 m-2 ">
                <div class="col-1 input-group form-outline">
                    <span class="input-group-text"> da </span>
                    {{ Form::text('prezzo_min', '', ['placeholder' => 'prezzo minimo', 'class' => 'form-control form-control-sm']) }}
                    <span class="input-group-text"> a </span>
                    {{ Form::text('prezzo_max', '', ['placeholder' => 'prezzo massimo', 'class' => 'form-control form-control-sm']) }}
                    <span class="input-group-text"> € </span>
                </div>
                <div class="more-fields alloggio col-1 input-group form-outline">
                    {{ Form::text('dimensione', '', ['placeholder' => 'dimensione/dimensione camera', 'class' => 'form-control input-sm']) }}
                </div>
                <div class="more-fields alloggio col-1 input-group form-outline">
                    <span class="input-group-text"> N. Camere </span>
                    {{ Form::number('camere', '', ['placeholder'=> "totale camere nell'allggio", 'class' => 'form-control']) }}   
                </div>
                <div class="more-fields appartamento col-1 input-group form-outline">
                    <span class="input-group-text"> N. Letti </span>
                    {{ Form::number('posti_letto', '1', ['class' => 'form-control']) }}   
                </div>
                <div class="more-fields letto col-1 input-group form-outline">
                    <span class="input-group-text"> N. Letti </span>
                    {{ Form::select('posti_letto', ['1' => 'Camera Singola', '2'=> 'Camera Doppia'],'' ,['class' => 'form-control']) }}   
                </div>
            </div>
            <div class="more-fields col">
                <div class="col row bg-light rounded shadow py-2 m-2">
                    <span class="col-sm-3 d-flex align-items-center form-lable"> Servizi </span> 
                    <select id="servizi" class="col servs bg-light form-select no-border" aria-label="" name="servizi[]" multiple>
                    </select> 
                </div>
                <div class="col row bg-light rounded shadow py-2 m-2">
                    <span class="col-sm-3 d-flex align-items-center form-lable"> Vicino a </span> 
                    <select id="vicino" class="col servs bg-light form-select no-border" name="servizi[]" multiple>
                    </select>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }} 
    <div class="container"> <!-- CARDS -->
        <div class="container-fluid col pt-2">
        @foreach($accomodations->chunk(3) as $chunk)
            <div class="card-group">
                @foreach($chunk as $accomodation)    
                    @include('components.card', [ 'accomodation' => $accomodation ] )
                @endforeach 
            </div>
        @endforeach
            <div class="container d-flex justify-content-center mt-3">
            {{$accomodations->onEachSide(2)->links()}}
            </div>
        </div>
    </div>
@endsection

