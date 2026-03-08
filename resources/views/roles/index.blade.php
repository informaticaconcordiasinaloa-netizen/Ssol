@extends('layouts.app')

@section('title', 'Tipos de usuario')

@section('content')

<h1>Tipos de Usuario</h1>

<a href="#" data-bs-toggle="modal" data-bs-target="#crearRol" class="btn btn-success mb-3">
    Añadir Tipo de Usuario
</a>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>

@foreach($roles as $role)

<tr>

<td>{{ $role->id }}</td>
<td>{{ $role->nombre }}</td>

<td>

<form action="{{ route('roles.destroy',$role->id) }}" method="POST">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar tipo de usuario?')">

Eliminar

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection