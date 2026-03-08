@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<h1>Productos</h1>

<table class="table table-bordered">

<thead>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
<th>Descripción</th>
</tr>

</thead>

<tbody>

@foreach ($productos as $producto)

<tr>

<td>{{ $producto->id }}</td>
<td>{{ $producto->nombre }}</td>
<td>{{ $producto->precio }}</td>
<td>{{ $producto->descripcion }}</td>

</tr>

@endforeach

</tbody>

</table>

@endsection