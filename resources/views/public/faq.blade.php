@extends('layouts.base') 
@section('title', 'FAQ')

@section('content')
<div class="static">
<br><center><h1>FAQ</h1></center><br>
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<hr/>
<div class="container">
<p class= "text-dark text-break"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<p class="text-secondary text-break">{{ $faq->risposta }} </p>
</div>
@endforeach
@endisset()
</div>
@endsection
