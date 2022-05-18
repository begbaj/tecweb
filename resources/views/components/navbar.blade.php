<nav class="navbar <?php if(!isset($hideLoginForm)){echo 'fixed-top'; }?> navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"> <img src="/img/brand/logo-colored.png" height="50"></a>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publicCatalog') }}">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('who') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
                </li>
            </ul>
            @if (isset($hideLoginForm))
            @else
            <form class="form-inline d-flex mt-3">
                <input class="form-control me-2" type="username" placeholder="username">
                <input class="form-control me-2" type="password" placeholder="password">
                <button class="btn btn-primary me-2" type="button">Accedi</button>
                <a class="btn btn-primary me-2" href="{{ route('signin') }}" >Registrati</a>
            </form>
            @endif
        </div>
    </div>
</nav>
