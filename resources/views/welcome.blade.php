@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenidos al sitio web</h1>

    @auth
        <p>Hola, <strong>{{ Auth::user()->name }}</strong>. ¡Qué gusto verte de nuevo!</p>
    @else
        <p>Por favor, inicia sesión para acceder a todas las funciones.</p>
    @endauth
@endsection
