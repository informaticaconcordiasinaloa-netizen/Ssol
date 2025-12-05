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

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
