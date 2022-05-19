@extends('layouts.public') 

@section('content')
@isset($faq)
@php $count=0; @endphp
@foreach ($faq as $faq)
<p class="text-black text-align"> @php echo ++$count; @endphp {{ $faq->domanda }} </p>
<p class="text-grey-darker text-align"> {{ $faq->risposta }} </p>
@endforeach
@endisset()
@endsection