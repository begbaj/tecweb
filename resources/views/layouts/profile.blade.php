<head>
    @include('components/_meta')
    <title> Kumuuzag - @yield('title') </title>
</head>
<body>
    <!-- HEADER -->
    <header class="container-mt5 header">
        @include('components/navbar')
    </header>
    
    <!-- CONTENT -->
    <div class="container-fluid bg-body">
        <div class="container bg-light mt-5 mb-5 pb-5 pt-5">
            @yield('content')
        </div>
    </div>
    
    <div class="container">
        <footer class="row row-cols-5 py-5 my-5 border-top">
            @include('components/_footer')
        </footer>
    </div>
</body>

</html>