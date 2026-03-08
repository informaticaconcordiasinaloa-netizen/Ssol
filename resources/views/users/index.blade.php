@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<h1>Usuarios</h1>

<a href="{{ route('users.create') }}" class="btn btn-success mb-3">
    Añadir Usuario
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Departamento</th>
            <th>Tipo de usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @foreach($users as $user)

        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department->nombre ?? 'Sin departamento' }}</td>
            <td>{{ $user->role->nombre ?? 'Sin rol' }}</td>

            <td>
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">
                    Editar
                </a>
            </td>
        </tr>

    @endforeach

    </tbody>

</table>

@endsection