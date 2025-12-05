@extends('layouts.app')

@section('title', 'Editar departmento')

@section('content')
<h1>Editar departmento</h1>

<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $department->nombre }}" required>
    </div>

    <div class="mb-3">
        <label>Activo</label>
        <select name="activo" class="form-control">
            <option value="1" {{ $department->activo ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$department->activo ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Editable</label>
        <select name="editable" class="form-control">
            <option value="1" {{ $department->editable ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$department->editable ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
