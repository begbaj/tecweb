<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"> <img src="/img/brand/logo-colored.png" height="50"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
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
            <form class="d-flex">
            @if (isset($hideLoginForm))
            @else
                <input class="form-control me-2" type="username" placeholder="username">
                <input class="form-control me-2" type="password" placeholder="password">
                <button class="btn btn-primary me-2" type="button">Accedi</button>
                <button class="btn btn-primary me-2" type="button">Registrati</button>
            @endif
            </form>
        </div>
    </div>
</nav>
