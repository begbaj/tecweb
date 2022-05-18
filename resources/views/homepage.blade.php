<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
      -->

</head>

<body>
    <!-- HEADER -->
    <header class="container-mt5 header">
       @include('layouts/navbar')
    </header>
    <div class="container-fluid bg-body">
        <div class="container bg-light mt-5 mb-5 pb-5 pt-5">
            <!-- Carousel (slideshow) -->
            <div class="container" >
                <div id="slideshow" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner rounded" style="height: 520px;">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/test-hiQ.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/test-loQ.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/test-hiQ.jpg" alt="Third slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Text Cloud -->
            <section class="jumbotron text-center rounded border mt-5 mb-5 pt-5 pb-5 ps-5 pe-5">
                <div class="container">
                    <h1 class="jumbotron-heading">Kumuuzag é fatto per gli studenti</h1>
                    <p class="lead text-muted">Con Kumuuzag la tua vita sarà finalmente semplice:
                    cerca un appartamento per te e i tuoi amici oppure trova un posto letto disponibile
                    nelle vicinanze della tua Università!</p>
                </div>
            </section>
            <!-- Array -->
            <div class="container py-2 bg-light">
                <div class="row overflow-hidden d-flex flex-row flex-nowrap">
                @isset($accomodations)
                    @foreach ($accomodations as $accomodation)
                        @include('layouts/accomodationCard', $accomodation)
                    @endforeach 
                @endisset()
                <a href="homepage.html" style="text-decoration: none;"> <p class="text-center mt-2 fs-2">Vai al catalogo</p></a>
            </div>
            <!-- Registrati -->
            <div class="container">
                <p class="fs-1 text-center"> Registrati! </p>
                <div class="row align-items-start">    
                    <button class="col btn btn-secondary mt-2 me-2">
                        <p class="fs-2">Locatore</p>
                        <ul>
                            <li>Metti in affito il tuo alloggio</li>
                            <li>Gestisci le tue inserzioni</li>
                            <li>Rispondi ai clienti interessati</li>
                        </ul>
                    </button>
                    <button class="col btn btn-secondary mt-2 me-2">
                        <p class="fs-2">Locatario</p>
                        <ul>
                            <li>Trova l'alloggio che fa al caso tuo</li>
                            <li>Gestisci le tue prenotazioni</li>
                            <li>Contatta i locatori</li>
                        </ul>
                    </button>
                </div>
            </div>
            <!-- Aiuto -->
            <div class="container border rounded mt-5">
                <div class="row">
                    <div class="col">
                        <div class="row" >
                            <p class="fs-1">Hai delle domande?</p>
                        </div>
                        <div class="row" style="margin-top: 10em;">
                            <a href="faq.html" class="col align-self-end btn btn-primary mt-1 me-2 ms-2">Vai alle FAQs</a>
                            <a href="mailto:s1093394@studenti.univpm.it?Subject=Help%20request" target="_top" class="col mt-1 align-self-end btn btn-primary me-2 ms-2">Contattaci</a>
                        </div>
                    </div>
                    <div class="col w-50 align-self-center">
                            <img src="img/brand/logo.png" class="ms-5 img-fluid p-5" width="350">
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
  <footer class="row row-cols-5 py-5 my-5 border-top">
    <div class="col">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
          <img src="img/brand/logo.png" height="100">
      </a>
      <p class="text-muted">© 2021</p>
    </div>

    <div class="col">

    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>
  </footer>
</div>
</body>

</html>
