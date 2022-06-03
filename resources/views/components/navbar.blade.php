<nav class="navbar @if (!isset($hideLoginForm)) fixed-top @endif navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"> <img src="{{ URL::asset('img/brand/logo-colored.png') }}" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            @if (Auth::check() && auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.stats') }}">Statistiche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.faq') }}">Gestione FAQ</a>
                </li>
            @elseif (Auth::check() && auth()->user()->hasRole('locatore'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Catalogo Pubblico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lore.accom.new') }}">Inserisci Alloggio</a>
                </li>
            @elseif (Auth::check() && auth()->user()->hasRole('locatario'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lario') }}">Ricerca</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('who') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
                </li>
            @endif    
            </ul>
            
             
            @if (Auth::check())

                @if (auth()->user()->hasRole('locatario'))
		    <a class="me-4" href="{{ route('chat')}}">
			<img src="{{ asset('img/message-square.svg') }}">
		    </a>
		    <a class="me-4" href="{{ route('lario.me') }}">
			<img src="{{ asset('img/user.svg') }}">
		    </a>
                @elseif (auth()->user()->hasRole('locatore'))
		    <a class="me-4" href="{{ route('chat') }}">
			<img src="{{ asset('img/message-square.svg') }}">
		    </a>
		    <a class="me-4" href="{{ route('lore.me') }}">
			<img src="{{ asset('img/user.svg') }}">
		    </a>
                @endif

            {{ Form::open(array('route' => 'logout', 'id' => 'navbar-logout', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::submit('Logout', ['class' => 'btn btn-primary me-2']) }}
            {{ Form::close() }}

            @elseif (!isset($hideLoginForm))

            {{ Form::open(array('route' => 'login', 'id' => 'navbar-login', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::text('username','', ['placeholder'=> 'username', 'class' => 'form-control me-2']) }}
                {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control me-2']) }}
                @if ($errors->first('password') or $errors->first('username'))
                    {{ Form::submit('Accedi', ['class' => 'btn btn-danger me-2']) }}
                    {{-- idea: ajax to redirect user to the login page if authentication goes wrong --}} 
                @else
                    {{ Form::submit('Accedi', ['class' => 'btn btn-primary me-2']) }}
                @endif
                <a class="btn btn-primary me-2" href="{{ route('register') }}" >Registrati</a>
            {{ Form::close() }}
            @endif
        </div>
    </div>
</nav>
