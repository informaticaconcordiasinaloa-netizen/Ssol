@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<h1>Departamentos</h1>

<a href="{{ route('departments.create') }}" class="btn btn-success mb-3">
    Añadir Departamento
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Editable</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $dep)
        <tr>
            <td>{{ $dep->id }}</td>
            <td>{{ $dep->nombre }}</td>
            <td>{{ $dep->activo ? 'Sí' : 'No' }}</td>
            <td>{{ $dep->editable ? 'Sí' : 'No' }}</td>
            <td>
                @if($dep->editable)
                    <a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-primary btn-sm">
                        Editar
                    </a>
                @else
                    <button class="btn btn-secondary btn-sm" disabled>
                        No editable
                    </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
