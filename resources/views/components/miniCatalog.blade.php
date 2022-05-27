<div class='container'>
    @isset($accoms)
        @foreach($accoms as $accom)
            @include('components.card', ['accomodation' => $accom])
        @endforeach
    @endisset
</div>
