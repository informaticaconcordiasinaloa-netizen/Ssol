@extends('layouts.app')

@section('title', 'Añadir departamento')

@section('content')
<h1>Añadir departamento</h1>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>

        @error('nombre')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Activo</label>
        <select name="activo" class="form-control">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Editable</label>
        <select name="editable" class="form-control">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
