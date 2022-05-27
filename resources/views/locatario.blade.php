@extends('layouts.locatario')

@section('title', 'Area Locatario')

@section('content')

<section class="py-4 container-fluid ">
    <div class="text-center mb-3">
        <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
    </div>
    <div class="text-center">
        <h4>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }} nella tua area personale!</h4>
    </div>
    
    {{Form::open(array('id' => 'filter-form', 'files' => false )) }}
    <div class='d-flex justify-content-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-items-center mt-5 pe-5">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                {{ Form::label('location', 'Località', ['class' => 'col-sm-2 col-form-label', 'for' => 'location']) }}
                <div class="col-sm-10 ps-3">
                {{ Form::text('location', '', ['value' => old("location"), 'placeholder'=> 'Località', 'class' => 'form-control ms-4']) }}
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                {{ Form::label('start-date', 'Inizio', ['class' => 'col-sm-2 col-form-label', 'for' => 'start-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('start-date', \Carbon\Carbon::now(), ['value' => old('start-date'), 'class' => 'form-control ms-4']) }}
                </div>
            </div>

            <div class="form-outline row ms-5 mb-4 mt-4 pe-3 w-25">
                {{ Form::label('end-date', 'Fine', ['class' => 'col-sm-2 col-form-label', 'for' => 'end-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('end-date', \Carbon\Carbon::now(), ['value' => old('end-date'), 'class' => 'form-control ms-4']) }}
                </div>
            </div>
            
            <div class="text-center col pt-2 ps-4">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2']) }}
            </div>
        </div>
    </div>
    
    <div class="d-flex row border border-secondary rounded justify-content-start mt-3 ms-0" style="width: 35%">
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                {{ Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type']) }}
                <div class="d-flex col-7 ms-3">
                {{ Form::select('type', ['appartamento' => "Appartamento", 'posto-letto' => "Posto Letto"], old("type"), ['class' => 'form-control ms-4']) }}
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                {{ Form::label('min-price', 'Prezzo Min', ['class' => 'col-sm-2 col-form-label', 'for' => 'min-price']) }}
                 <div class="d-flex col-7 ms-3">
                {{ Form::text('min-price', '', ['value' => old("min-price"), 'placeholder' => 'prezzo minimo', 'class' => 'form-control ms-4']) }}
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-2 me-1">
                {{ Form::label('max-price', 'Prezzo Max', ['class' => 'col-sm-2 col-form-label', 'for' => 'max-price']) }}
                 <div class="d-flex col-7 ms-3">
                {{ Form::text('max-price', '', ['value' => old("max-price"), 'placeholder' => 'prezzo massimo', 'class' => 'form-control ms-4']) }}
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                {{ Form::label('dimension', 'Dimensione', ['class' => 'col-sm-2 col-form-label', 'for' => 'dimension']) }}
                 <div class="d-flex col-7 ms-3">
                {{ Form::text('dimension', '', ['value' => old("dimension"), 'placeholder' => 'dimensione', 'class' => 'form-control ms-4']) }}
                </div>
            </div>
        </div>
        
        <div class="container">
            <div  class="form-outline d-flex row align-items-center justify-content-center pt-3 me-1">
                {{ Form::label('n-rooms', 'Numero Camere', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-rooms']) }}
                <div class="d-flex col-7 ms-3">
                {{ Form::number('n-rooms', '0', ['value'=> old("n-rooms"), 'class' => 'form-control ms-4']) }}   
                </div>
            </div>
        </div>
        
        <div class="container">
            <div  class="form-outline d-flex row align-items-center justify-content-center pt-2 pb-2 me-1">
                {{ Form::label('n-beds', 'Posti Letto', ['class' => 'col-sm-2 col-form-label', 'for'=> 'n-beds']) }}
                <div class="d-flex col-7 ms-3">
                {{ Form::number('n-beds', '0', ['value'=> old("n-beds"), 'class' => 'form-control ms-4']) }}   
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex row border border-secondary rounded mt-3 ms-0" style="width: 35%">
        <div class="text-center pt-2">
            <h5>Servizi</h5>
        </div>
        
        <div class ="form-outline d-flex align-items-center me-1 mb-3">
            <div class="row ms-2">
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('cucina', 'Cucina', null) }}
                {{ Form::label('cucina', 'Cucina', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'cucina']) }}
                </div>

                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('locale-ricreativo', 'Locale Ricreativo', null) }}
                {{ Form::label('locale-ricreativo', 'Locale Ricreativo', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'locale-ricreativo']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('box-doccia', 'Box Doccia', null) }}
                {{ Form::label('box-doccia', 'Box Doccia', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'box-doccia']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('condizionatore', 'Condizionatore', null) }}
                {{ Form::label('condizionatore', 'Condizionatore', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'condizionatore']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('asciugatrice', 'Asciugatrice', null) }}
                {{ Form::label('asciugatrice', 'Asciugatrice', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'asciugatrice']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('fumatori', 'Fumatori', null) }}
                {{ Form::label('fumatori', 'Fumatori', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'fumatori']) }}
                </div>   
            </div>
            
            <div class="row ps-4">
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('angolo-studio', 'Angolo Studio', null) }}
                {{ Form::label('angolo-studio', 'Angolo Studio', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'angolo-studio']) }}
                </div>

                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('vasca', 'Vasca', null) }}
                {{ Form::label('vasca', 'Vasca', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'vasca']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('wifi', 'WiFi', null) }}
                {{ Form::label('wifi', 'WiFi', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'wifi']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('lavatrice', 'Lavatrice', null) }}
                {{ Form::label('lavatrice', 'Lavatrice', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'lavatrice']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('riscaldamento', 'Riscaldamento', null) }}
                {{ Form::label('riscaldamento', 'Riscaldamento', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'riscaldamento']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('tv', 'TV', null) }}
                {{ Form::label('tv', 'TV', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'tv']) }}
                </div>   
            </div>
        </div>
    </div>
    
    <div class="d-flex row border border-secondary rounded mt-3 ms-0" style="width: 35%">
        <div class="text-center pt-2">
            <h5>Vicino a...</h5>
        </div>
        
        <div class="form-outline d-flex align-items-center me-1 mb-3">
            <div class="row ms-2">
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('facoltà', 'Facoltà', null) }}
                {{ Form::label('facoltà', 'Facoltà', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'facoltà']) }}
                </div>

                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('supermercato', 'Supermercato', null) }}
                {{ Form::label('supermercato', 'Supermercato', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'supermercato']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('fermata-metro', 'Fermata Metro', null) }}
                {{ Form::label('fermata-metro', 'Fermata Metro', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'fermata-metro']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('centro-città', 'Centro Città', null) }}
                {{ Form::label('centro-città', 'Centro Città', ['class' => 'col-sm-12 col-form-label ps-2', 'for' => 'centro-città']) }}
                </div>
            </div>
            
            <div class="row ms-4">
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('mensa', 'Mensa', null) }}
                {{ Form::label('mensa', 'Mensa', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'mensa']) }}
                </div>

                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('stazione', 'Stazione', null) }}
                {{ Form::label('stazione', 'Stazione', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'stazione']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('fermata-bus', 'Fermata Bus', null) }}
                {{ Form::label('fermata-bus', 'Fermata Bus', ['class' => 'col-sm-10 col-form-label ps-2', 'for' => 'fermata-bus']) }}
                </div>
                
                <div class="d-flex align-items-center pt-1">
                {{ Form::checkbox('palestra', 'Palestra', null) }}
                {{ Form::label('palestra', 'Palestra', ['class' => 'col-sm-2 col-form-label ps-2', 'for' => 'palestra']) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}    
</section>
@endsection

