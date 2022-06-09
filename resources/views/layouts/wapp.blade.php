<!DOCTYPE html>
<html>
<head> 
    <title> Kumuuzag - @yield('title') </title>

    @include('components/_meta')
    @yield('meta')

    <script type="text/javascript" src="https://kit.fontawesome.com/c0c07ca5e1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('scripts')

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('style')

</head>
<body>
    <!-- HEADER -->
    @include('components/navbar', ['nofix' => true])

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <div class="container">
        <footer class="row row-cols-5 py-5 my-5 border-top">
            @include('components/_footer')
        </footer>
    </div>
</body>
</html>
