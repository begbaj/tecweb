@extends('layouts.public', ['hideLoginForm' => True])

@section('title', 'Login')

@section('content')
<div class="container-fluid bg-light">
    <div class="jumbotron bg-cover rounded ml-5 mr-5" style="background-image: linear-gradient(to bottom, rgba(3,169,244,0.7) 0%, rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature); background-size: cover">    
      <div class="container text-light">  
        <div class="container bg-transparent mt-5 mb-4 pb-0 pt-5 text-center ">
            <div class="text-center mb-3">
                <img src="{{ URL::asset('img/brand/logo-colored.png') }}" style="width: 80px;" alt="logo-coloured">
            </div>
            <h2 class="jumbotron-heading jumbotron-fluid"> Benvenuto su Kumuuzag!</h2>
            <h2 class="lead"> Effettua il login.</h2>
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                <div class= "d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}
                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                            {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                            </div>
                        </div>
                    @if ($errors->first('username'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('username') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>     
                    @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-outline row mb-2 mt-4 w-50 ">
                        {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                        <div class="d-flex justify-content-center">
                            <div class="col-sm-7 pt-1">
                                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                            </div>
                        </div>
                    @if ($errors->first('password'))
                     <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-3 pt-0 pb-0">
                        @foreach ($errors->get('password') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                        </div>
                    </div>      
                    @endif
                    </div>
                </div>    
            <div class="text-center mt-3">
                {{ Form::submit('Login', ['class' => 'btn btn-primary mb-3 mt-2']) }}                
            </div>
            <div class="text-center mt-3 pb-3">
                <p><small>Non sei ancora registrato? <a href="{{ route('register') }}">Registrati ora!</a></small></p>
            </div>
            {{ Form::close() }}
        </div>
      </div>    
    </div>
</div>
@endsection
