@extends('layouts.app')

@section('content')
    <h1>Lista de Proyectos</h1>
    <a href="{{ route('proyectos.create') }}">Crear Nuevo Proyecto</a>

    <ul>
        @foreach ($proyectos as $proyecto)
            <li>
                <a href="{{ route('proyectos.edit', $proyecto->id) }}">{{ $proyecto->nombre }}</a>
                <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
