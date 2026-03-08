@extends('layouts.app')

@section('content')

<div class="container">

<h2>Tipos de Usuario</h2>

{{-- FORMULARIO PARA AGREGAR --}}
<form action="{{ route('roles.store') }}" method="POST">

@csrf

<input type="text" name="nombre" placeholder="Nuevo tipo de usuario" required>

<button type="submit">Agregar</button>

</form>

<br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Tipo de usuario</th>
<th>Acciones</th>
</tr>

@foreach($roles as $role)

<tr>

<td>{{ $role->id }}</td>
<td>{{ $role->nombre }}</td>

<td>

<form action="{{ route('roles.destroy',$role->id) }}" method="POST">

@csrf
@method('DELETE')

<button type="submit">Borrar</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

@endsection