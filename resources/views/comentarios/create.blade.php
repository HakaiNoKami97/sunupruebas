@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Comentario en {{ $proyecto->nombre }}</h1>
    @if (isset($tarea))
        <p>Tarea: {{ $tarea->nombre }}</p>
    @endif

    <form action="{{ isset($tarea) ? route('proyectos.tareas.comentarios.store', [$proyecto, $tarea]) : route('proyectos.comentarios.store', $proyecto) }}" method="POST">
        @csrf
        <label for="texto">Comentario:</label>
        <textarea name="texto" required></textarea>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Agregar Comentario</button>
    </form>
@endsection
