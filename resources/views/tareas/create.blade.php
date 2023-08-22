@extends('layouts.app')

@section('content')
    <h1>Agregar Nueva Tarea en {{ $proyecto->nombre }}</h1>

    <form action="{{ route('proyectos.tareas.store', $proyecto) }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Agregar Tarea</button>
    </form>
@endsection
