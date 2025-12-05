<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de 2 números</title>
</head>
<body>
@extends('layouts.app')
@section('content')

    <h2> Sumar 2 números</h2>
    <form action="/suma" method="POST">
        @csrf
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" id="num2" required>
        <br>
        <button type="sumbit">Sumar</button>
    </form>
    @if(isset($resultado))
        <h3>Resultado de la suma: {{ $resultado }}</h3>
        <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZ2UnMj-VTAysdLIcUInwTaDo_eHCdSjLYYQ&s" width="300" height="168" alt="The Song of the Life" class="mt-1">-->
    @endif
@endsection
</body>
</html>