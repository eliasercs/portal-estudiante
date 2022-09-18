@extends('layout.app')

@section('title', 'Home')

@section('content')
    
@if(auth()->check())
    <h1 class="text-5xl text-center pt-24">Bienvenido {{ auth()->user()->name }}</h1>
    @else
    <h1 class="text-5xl text-center pt-24">Portal del estudiante</h1>
    @endif


@endsection