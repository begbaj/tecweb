<nav class="navbar @if(!isset($hideLoginForm)) fixed-top @endif navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"> <img src="/img/brand/logo-colored.png" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('who') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
                </li>
            </ul>
            @if (Auth::check())
            {{ Form::open(array('route' => 'logout', 'id' => 'navbar-logout', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::submit('Logout', ['class' => 'btn btn-primary me-2']) }}
            {{ Form::close() }}
            @elseif (!isset($hideLoginForm))
            {{ Form::open(array('route' => 'login', 'id' => 'navbar-login', 'files' => false, 'class'=> 'form-inline d-flex mt-3')) }}
                {{ Form::text('username','', ['placeholder'=> 'username', 'class' => 'form-control me-2']) }}
                {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control me-2']) }}
                {{ Form::submit('Accedi', ['class' => 'btn btn-primary me-2']) }}
                <a class="btn btn-primary me-2" href="{{ route('signin') }}" >Registrati</a>
            {{ Form::close() }}
            @endif
        </div>
    </div>
</nav>
