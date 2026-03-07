@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar usuario</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Departamento</label>
            <select name="department_id" class="form-control">
                <option value="">Sin departamento</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $user->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de usuario</label>
            <select name="role_id" class="form-control">

                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
