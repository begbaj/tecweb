<head> 
    {{-- TODO: This layout should be named BASE --}}
    <title> Kumuuzag - @yield('title') </title>
    @include('components/_meta')
    @section('scripts')
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript">
            window.onload = function () {
                    cards = document.getElementsByClassName('card-text');

                    for(i=0; i< cards.length; i++){
                            cards[i].innerHTML = truncateText(cards[i].innerHTML, 120);
                    }

		    cards = document.getElementsByClassName('card-text text-muted float-end')

                    for(i=0; i< cards.length; i++){
                            cards[i].innerHTML = truncateText(cards[i].innerHTML, 30);
                    }
            }

            function truncateText(text, max_char){
                    if(text.length <= max_char){
                            return text;
                    }
                    return  text.slice(0,max_char-2) + '...';
            }
    </script>
    @show
    {{-- extra-head: other stuff to add in the header --}}
    @yield('extra-head')
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
