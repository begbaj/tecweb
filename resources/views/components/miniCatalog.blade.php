<div class='container'>
    @isset($accoms)
        @foreach($accoms as $accom) 
            @include('components.longcard', ['accomodation' => $accom])
        @endforeach
    @endisset
</div>
