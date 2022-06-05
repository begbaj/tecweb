@extends ('layouts.base')

@section('title', 'Area Profilo Personale')

@section('scripts')
<script>
    function editForm(){
        $('#editButtons, #passForm').toggleClass('visually-hidden');
        $('#firstname, #lastname, #username').prop('disabled', false);
    }
</script>
@endsection

@section('content')

<div class="container-fluid bd-light">
    <div class="container row">
        <div class="container mt-3">
            <h4 class="display-4">Area Profilo Utente</h4>  
        </div>
        <div class="container  lead">
            <p> In questa area puoi visualizzare e modificare i tuoi dati personali</p>
        </div> 
    </div>
      
    <div class="container mt-4 ps-4">
        <h6>Foto Profilo</h6>
    </div>
        
    <div class="d-flex justify-content-start mt-2">
       <div class="d-flex ps-4">
            <div class="container d-flex justify-content-center align-items-center border rounded border-secondary" style="width: 175px; height: 200px">
                @if (Auth::user()->genere = 'maschio')
                <img src="{{ asset('img/svg/male-user.svg') }}" height="190" width="165">
                @elseif (Auth::user()->genere = 'femmina')
                <img src="{{ asset('img/svg/female-user.svg') }}" height="190" width="165">
                @endif
            </div> 
       </div>   
    </div>
    
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
                    {{ Form::date('data_nascita', Auth::user()->data_nascita, ['class' => 'ps-1 lead d-flex align-items-center ms-2','disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Genere:</h5>
                    {{ Form::select('genere', ['m' => "Maschio", 'f' => "Femmina", 'b' => "Non Binario"], ucwords(Auth::user()->genere), ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'gender', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Username:</h5>
                    {{ Form::text('username', Auth::user()->username, ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'id' => 'username', 'disabled']) }}
                </div>
                
                <div class="d-flex align-items-center ps-5 pt-4">
                    <h5>Ruolo:</h5>
                    {{ Form::select('ruolo', ['locatore' => "Locatore", 'locatario' => "Locatario"], ucwords(Auth::user()->ruolo), ['class' => 'ps-1 lead d-flex align-items-center ms-2', 'disabled']) }}
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
                    {{ Form::text('password_confirmation', ['class' => 'ps-1 lead d-flex align-items-center ms-2 ']) }}
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
</div>

@endsection

