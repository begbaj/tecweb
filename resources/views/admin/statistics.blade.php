@extends('layouts.base')

@section('title', 'Statistiche')

@section('content')
@if (auth()->user('admin'))
{{Form::open(array('route' => 'admin.stats.search', 'id' => 'filter-form', 'files' => false, 'method'=>'GET' )) }}
    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                {{ Form::label('type', 'Tipologia', ['class' => 'col-sm-2 col-form-label', 'for'=>'type']) }}
                <div class="col-sm-10 ps-3">
                {{ Form::select('type', ['appartamento' => "appartamento", 'posto-letto' => "posto letto"], old("type"), ['class' => 'form-control ms-5']) }}
                </div>
            </div>
            
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                {{ Form::label('start-date', 'Inizio', ['class' => 'col-sm-3 col-form-label', 'for' => 'start-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('start-date', "", ['value' => null, 'class' => 'form-control ms-6']) }}
                </div>
                    @if ($errors->first('start-date'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('start-date') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>    
                    @endif         
            </div>

            <div class="form-outline row ms-3 mb-4 mt-4 w-25">
                {{ Form::label('end-date', 'Fine', ['class' => 'col-sm-3 col-form-label', 'for' => 'end-date']) }}
                <div class="col-sm-9 ps-3">
                {{ Form::date('end-date', "", ['value' => null, 'class' => 'form-control ms-6']) }}
                </div>
            </div>
                  @if ($errors->first('end-date'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('end-date') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>    
                    @endif  
            <div class="text-center col pt-2 ps-4">
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary mb-3 mt-2 ms-5']) }}
            </div>
        </div>
    </div> 
    {{Form::close()}}
    <div class='d-flex justify-content-center align-center'>
        <div class="container d-flex justify-content-center border row border-secondary rounded align-center mt-5 pe-5 align-items-center">
            <div class ="form-outline row ms-2 mb-4 mt-4 w-25">
                <p> Offerte di Alloggio </p>
                <div class="col-sm-10 ps-3">
                    @if(Route::is('stats'))                    
                    {{$count_rent}}
                    @endif
                </div>
            </div>
            
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Offerte di Locazione </p>
                <div class="col-sm-9 ps-3">
                    @if(Route::is('stats'))
                    {{$count_request}}
                    @endif
                </div>    
            </div>
            <div class="form-outline row ms-5 mb-4 mt-4 w-25">
                <p> Alloggi Locati </p>
                <div class="col-sm-9 ps-3">
                    @if(Route::is('stats'))                    
                    {{$count_assigned}}
                    @endif
                </div>    
            </div>
        </div>
    </div> 

@endif
@endsection
