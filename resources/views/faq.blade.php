@extends('layouts.public') 

@section('content')
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<div class="container text-center">
<p class= "text-dark"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<p class="text-secondary">{{ $faq->risposta }} </p>
</div>
@endforeach
@endisset()
@endsection