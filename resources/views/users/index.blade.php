@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        Crear nuevo usuario
    </a>
</div>

<table class="table table-striped table-hover table-bordered align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection