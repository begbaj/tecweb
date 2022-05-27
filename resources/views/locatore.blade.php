@extends('layouts.locatore')

@section('title', 'Area Locatore')

@section('content')
    @include('components.miniCatalog', ['accoms' => $accoms])
@endsection
