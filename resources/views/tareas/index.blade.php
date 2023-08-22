@extends('layouts.app')

@section('content')
    <h1>Lista de Tareas en {{ $proyecto->nombre }}</h1>
    <a href="{{ route('proyectos.tareas.create', $proyecto) }}">Agregar Nueva Tarea</a>

    <ul>
        @foreach ($tareas as $tarea)
            <li>
                <a href="{{ route('proyectos.tareas.edit', [$proyecto, $tarea]) }}">{{ $tarea->nombre }}</a>
                <form action="{{ route('proyectos.tareas.destroy', [$proyecto, $tarea]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
