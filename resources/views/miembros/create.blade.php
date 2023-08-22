@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Miembro del Equipo en {{ $proyecto->nombre }}</h1>

    <form action="{{ route('proyectos.miembros.store', $proyecto) }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Agregar Miembro</button>
    </form>
@endsection
