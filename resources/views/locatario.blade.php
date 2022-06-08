@extends('layouts.base')

@section('title', 'Area Locatario')

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/card-truncator.js') }}"></script>
<script type="text/javascript">
$(function () {
    $("#tipo").on('change', function(event) {
       $.ajax({
           type:'GET',
           url: '{{ route("api.servs") }}/' + $("#type").val(),
           data:'_token = <?php echo csrf_token(); ?>',
           success:updateServs
        });
       if ( $("#tipo").val() == "posto-letto" ){
            $("#camere").prop('readonly', true);
            $("#camere").val(1);
            $("#posti_letto").prop('readonly', true);
            $("#posti_letto").val(1);
       }
       else{
            $("#camere").prop('readonly', false);
            $("#posti_letto").prop('readonly', false);
       }
    });
    $('#tipo').change();

    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom auto',
        autoclose: true,
        todayHighlight: true,
    });
});    
function updateServs(data){
    $('#servizi').find('*').remove();
    $('#vicino').find('*').remove();
     var servs = <?php if(null != old('servizi')) print_r(json_encode(old('servizi'))); else echo 'null'; ?>;
     $.each(data, function (key, val) {
        var element = '<div class="form-check">' +
            '<input name="servizi[]" class="form-check-input" type="checkbox" value="' + val.id + '" id="' + val.id + '"';
        if (servs != null && servs.includes(String(val.id))){
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
<section class="py-4 container-fluid ">

    <div class="text-center mb-3">
        <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
    </div>

    <div class="text-center">
        <h4>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }} nella tua area personale!</h4>
    </div>
    
    {{ Form::open(array('route' => [ 'lario.search' ], 'method' => 'GET', 'id' => 'filter-form', 'files' => false )) }}
        <div class='d-flex justify-content-center'>
            <div class="container d-flex justify-content-center border row border-secondary rounded align-items-center mt-5 pe-5">
                <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                        {{ Form::label('luogo', 'Luogo', ['class' => 'col-sm-2 col-form-label', 'for' => 'location']) }}
                    <div class="col-sm-10 ps-3">
                        {{ Form::text('luogo', '', ['value' => old("luogo"), 'placeholder'=> 'Luogo', 'class' => 'form-control ms-4']) }}
                    </div>
                </div>
     
                <div class="col-sm-2 d-flex justify-content-end">
                    {{ Form::label('range', 'Disponibilità', ['class' => ' col-form-label',  'for'=>'data_min data_max']) }}
                </div>

                <div class="col-sm-4">
                    <div class="input-daterange input-group" id="datepicker">
                        <span class="input-group-text"> dal </span>
                            {{ Form::text('data_min', old('data_min'), ['class' => 'input-sm form-control']) }}
                        <span class="input-group-text"> al </span>
                            {{ Form::text('data_max', old('data_max'), ['class' => 'input-sm form-control']) }}
                    </div>
                </div>
                
                <div class="text-center col-sm-2 pt-2 ps-4">
                    {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2']) }}
                </div>

            </div>
        </div>
        
        <div class="container">
            <div class="d-flex justify-content-center border border-primary mt-3 pb-4 rounded row" style="height: 435px">
                <div class="d-flex row mt-3 align-items-center" style="width: 350px">
                    <div class="container">
                        <div class="form-outline d-flex row align-items-center justify-content-center pt-1">
                            {{ Form::label('tipo', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type']) }}
                            <div class="d-flex col-7 ms-3">
                            {{ Form::select('tipo', ['appartamento' => "Appartamento", 'posto_letto' => "Posto Letto"], old('tipo') , ['class' => 'form-control ms-4']) }}
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                            {{ Form::label('prezzo_min', 'Prezzo Min', ['class' => 'col-sm-2 col-form-label', 'for' => 'min-price']) }}
                             <div class="d-flex col-7 ms-3">
                            {{ Form::text('prezzo_min', '', ['value' => old("prezzo_min"), 'placeholder' => 'prezzo minimo', 'class' => 'form-control ms-4']) }}
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="form-outline d-flex row align-items-center justify-content-center pt-0 ">
                            {{ Form::label('prezzo_max', 'Prezzo Max', ['class' => 'col-sm-2 col-form-label', 'for' => 'max-price']) }}
                             <div class="d-flex col-7 ms-3">
                            {{ Form::text('prezzo_max', '', ['value' => old("prezzo_max"), 'placeholder' => 'prezzo massimo', 'class' => 'form-control ms-4']) }}
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                            {{ Form::label('dimensione', 'Dimensione(mq)', ['class' => 'col-sm-2 col-form-label', 'for' => 'dimension']) }}
                             <div class="d-flex col-7 ms-3">
                            {{ Form::text('dimensione', '', ['value' => old("dimensione"), 'placeholder' => 'dimensione', 'class' => 'form-control ms-4']) }}
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div  class="form-outline d-flex row align-items-center justify-content-center pt-2 ">
                            {{ Form::label('camere', 'Numero Camere', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-rooms']) }}
                            <div class="d-flex col-7 ms-3">
                            {{ Form::number('camere', '1', ['value'=> old("camere"), 'class' => 'form-control ms-4']) }}   
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div  class="form-outline d-flex row align-items-center justify-content-center pt-0 pb-2 ">
                            {{ Form::label('posti_letto', 'Posti Letto', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-beds']) }}
                            <div class="d-flex col-7 ms-3">
                            {{ Form::number('posti_letto', '1', ['value'=> old("posti_letto"), 'class' => 'form-control ms-4']) }}   
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex row mt-2" style="width: 350px; height: 250px">
                    <div class="text-center pt-2 ps-5">
                        <h5>Servizi</h5>
                    </div>
                    <div id="servizi" class="mt-1 ps-5">
                    </div> 
                </div>

                <div class="d-flex row mt-2" style="width: 350px; height: 250px">
                    <div class="text-center pt-2 ps-5">
                        <h5>Vicino a...</h5>
                    </div> 
                    <div id="vicino" class="mt-1 ps-5">
                    </div>
                </div>
            </div>
            
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
    {{ Form::close() }} 
    
   
</section>
@endsection

