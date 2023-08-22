@extends('layouts.app')

@section('content')
    <h1>Lista de Comentarios en {{ $proyecto->nombre }}</h1>
    @if (isset($tarea))
        <p>Tarea: {{ $tarea->nombre }}</p>
    @endif
    <a href="{{ isset($tarea) ? route('proyectos.tareas.comentarios.create', [$proyecto, $tarea]) : route('proyectos.comentarios.create', $proyecto) }}">Agregar Nuevo Comentario</a>

    <ul>
        @foreach ($comentarios as $comentario)
            <li>
                <a href="{{ isset($tarea) ? route('proyectos.tareas.comentarios.edit', [$proyecto, $tarea, $comentario]) : route('proyectos.comentarios.edit', [$proyecto, $comentario]) }}">{{ $comentario->texto }}</a>
                <form action="{{ isset($tarea) ? route('proyectos.tareas.comentarios.destroy', [$proyecto, $tarea, $comentario]) : route('proyectos.comentarios.destroy', [$proyecto, $comentario]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
