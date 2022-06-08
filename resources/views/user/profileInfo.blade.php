@extends ('layouts.base')

@section('title', 'Area Profilo Personale')

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
    function editForm(){
        $('#editButtons, #passForm').toggleClass('visually-hidden');
        $('#birthday').toggleClass('text-muted');
        $('#firstname, #lastname, #birthday, #gender,  #username').prop('disabled', false);
    }
    
$(function (){
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom',
        autoclose: true,
        todayHighlight: true,
        datesDisabled: ['06/06/2022', '06/21/2022']
    });
}); 
</script>
@endsection

@section('content')

<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3">
            <h4 class="display-4">Area Profilo Utente</h4>  
        </div>
        @if(isset($user))
        <div class="container  lead">
            <p> In questa area puoi visualizzare i dati dell'utente che ti ha contattato</p>
        </div>
        @else
        <div class="container  lead">
            <p> In questa area puoi visualizzare e modificare i tuoi dati personali</p>
        </div>
        @endif
    </div>
      
    <div class="container mt-4 ps-4">
        <h6>Foto Profilo</h6>
    </div>
        
    <div class="d-flex justify-content-start mt-2">
       <div class="d-flex ps-4">
            <div class="container d-flex justify-content-center align-items-center border rounded border-secondary" style="width: 175px; height: 200px">
                <img src="{{ asset('img/svg/male-user.svg') }}" height="190" width="165">
            </div> 
       </div>   
    </div>
    
    @isset($user)
    <div class="d-flex row border border-secondary rounded justify-content-start mt-4 ms-4 pb-2" style="width: 60%">
        <div class ="d-flex justify-content-center mt-3">
            <h4>Dati dell'Utente</h4>
        </div>
        
        <div class="d-flex mt-2 mb-2 ">
            <div class ="row">
                <div class="d-flex align-items-center ps-5">
                    <h5>Nome:</h5>
                    <div class="col lead ms-3 mb-1">
                        {{ $user->nome }}
                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Cognome:</h5>
                    <div class="col lead  ms-3 mb-1">
                        {{ $user->cognome}}
                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Data di Nascita:</h5>
                    <div class=" col lead ms-3 mb-1">
                        {{ substr($user->data_nascita, 0, -9) }}
                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Genere:</h5>
                    <div class=" col lead ms-3 mb-1">
                        @if ($user->genere == 'm') Maschio
                        @elseif ($user->genere == 'f') Femmina
                        @else Non Binario
                        @endif
                    </div>
                </div>   
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Username:</h5>
                    <div class=" col lead ms-3 mb-1">
                        {{ $user->username }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endisset
    
    @empty($user)
    {{ Form::open( ['route' => 'user.me.edit', 'id' => 'edit-form', 'files' => false]) }}
    {{ Form::token() }}
    <div class="d-flex row border border-secondary rounded justify-content-start mt-4 ms-4 pb-2" style="width: 60%">
        <div class ="d-flex justify-content-center mt-3 pb-3">
            <h4>I tuoi dati</h4>
        </div>
        
        <div class="d-flex mt-2 ">
            <div class ="row">
                <div class="d-flex align-items-center ps-5">
                    <h5>Nome:</h5>
                    {{ Form::text('nome', Auth::user()->nome, ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'firstname', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Cognome:</h5>
                    {{ Form::text('cognome', Auth::user()->cognome, ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'lastname', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Data di Nascita:</h5>
                    <div class="input-daterange col-sm-7 ps-1" id="datepicker">
                    {{ Form::text('data_nascita', substr(Auth::user()->data_nascita, 0, -8), ['class' => 'input-sm form-control ps-1 text-muted d-flex align-items-center', 'id' => 'birthday', 'disabled']) }} 
                    </div>
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Genere:</h5>
                    {{ Form::select('genere', ['m' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], Auth::user()->genere, ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'gender', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Username:</h5>
                    {{ Form::text('username', Auth::user()->username, ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'username', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center justify-content-start ps-5 pt-4 pb-2">
                    <h5>Ruolo:</h5>
                    <div class="ms-3 mb-1 lead text-muted border border-dark ps-1 pe-5">
                    {{ ucwords(Auth::user()->ruolo) }}
                    </div>
                </div>
                
                <div id="passForm" class="d-flex align-items-center ps-5 pt-4 visually-hidden">
                    <h5>Nuova Password:</h5>
                    {{ Form::text('password','', ['class' => 'ps-1 lead d-flex align-items-center ms-2']) }}
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
                
                <div id="passForm" class="d-flex align-items-center ps-5 pt-4 visually-hidden">
                    <h5>Conferma Password:</h5>
                    {{ Form::text('password_confirmation', ' ', ['class' => 'ps-1 lead d-flex align-items-center ms-2 ']) }}
                @if ($errors->first('password'))
                    <div class="d-flex justify-content-center">
                        <div class="errors alert alert-danger d-flex col-sm-5 justify-content-center mt-2 pt-0 pb-0">
                        @foreach ($errors->get('password') as $message)
                        <div class="d-flex justify-content-center">{{ $message }}</div>
                        @endforeach
                          </div>
                    </div> 
                @endif
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-start ps-5 pt-4 pb-2">
            <a id="editButtons" class="btn btn-primary" onClick="editForm()">Modifica</a>  
        </div>
        
        <div class="d-flex justify-content-end mb-2">
            <input type = "hidden" name = "id" value = "{{ Auth::user()->id }}" />
            {{ Form::submit('Conferma', ['class' => 'btn btn-success visually-hidden me-2', 'id' => 'editButtons']) }}
            <a id="editButtons" class="btn btn-danger visually-hidden" href="{{ route('user.me') }}">Annulla</a>  
        </div>     
    </div>
    {{ Form::close() }}
     @endempty
</div>

@endsection

