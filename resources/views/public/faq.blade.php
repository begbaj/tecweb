@extends('layouts.base') 
@section('title', 'FAQ')

@section('content')
<div class="static">
<br><center><h1>FAQ</h1></center><br>
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<div class="cloud-container text-break p-1 m-2">
<p class= "text-dark text-break m-3"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<hr class="my-1 mx-3"/>
<p class="text-secondary text-break mx-3 mt-2">{{ $faq->risposta }} </p>
</div>
<br>
@endforeach
@endisset()
</div>
@endsection
