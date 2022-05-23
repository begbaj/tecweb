@extends('layouts.public') 
@section('title', 'FAQ')

@section('content')
<div class="static">
<br><center><h1>FAQ</h1></center><br>
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<div class="container text-center">
<p class= "text-dark"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<p class="text-secondary">{{ $faq->risposta }} </p>
</div>
</div>

@endforeach
@endisset()
@endsection