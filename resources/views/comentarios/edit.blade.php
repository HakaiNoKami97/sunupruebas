@extends('layouts.app')

@section('content')
    <h1>Editar Comentario</h1>
    @if (isset($tarea))
        <p>Tarea: {{ $tarea->nombre }}</p>
    @endif

    <form action="{{ isset($tarea) ? route('proyectos.tareas.comentarios.update', [$proyecto, $tarea, $comentario]) : route('proyectos.comentarios.update', [$proyecto, $comentario]) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="texto">Comentario:</label>
        <textarea name="texto" required>{{ $comentario->texto }}</textarea>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Actualizar Comentario</button>
    </form>
@endsection
