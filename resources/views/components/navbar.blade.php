<nav class="navbar @if (!isset($hideLoginForm)) fixed-top @endif navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"> <img src="{{ URL::asset('img/brand/logo-colored.png') }}" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            @if (Auth::check() && auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admcat') }}">Catalogo</a>
                </li>
            @if (auth()->user('admin'))

            @elseif (Auth::check() && auth()->user()->hasRole('locatore'))

            @elseif (Auth::check() && auth()->user()->hasRole('locatario'))

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
            @if (!auth()->user('admin'))
                    <a class="me-4" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/></svg></a>
            @endif
            {{ Form::open(array('route' => 'logout', 'id' => 'navbar-logout', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::submit('Logout', ['class' => 'btn btn-primary me-2']) }}
            {{ Form::close() }}
            @elseif (!isset($hideLoginForm))
            {{ Form::open(array('route' => 'login', 'id' => 'navbar-login', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::text('username','', ['placeholder'=> 'username', 'class' => 'form-control me-2']) }}
                {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control me-2']) }}
                {{ Form::submit('Accedi', ['class' => 'btn btn-primary me-2']) }}
                <a class="btn btn-primary me-2" href="{{ route('register') }}" >Registrati</a>
            {{ Form::close() }}
            @endif
        </div>
    </div>
</nav>
