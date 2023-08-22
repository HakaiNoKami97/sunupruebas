@extends('layouts.app')

@section('content')
    <h1>Editar Miembro del Equipo: {{ $miembro->nombre }}</h1>

    <form action="{{ route('proyectos.miembros.update', [$proyecto, $miembro]) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $miembro->nombre }}" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Actualizar Miembro</button>
    </form>
@endsection
