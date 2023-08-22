@extends('layouts.app')

@section('content')
    <h1>Editar Tarea: {{ $tarea->nombre }}</h1>

    <form action="{{ route('proyectos.tareas.update', [$proyecto, $tarea]) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $tarea->nombre }}" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Actualizar Tarea</button>
    </form>
@endsection
