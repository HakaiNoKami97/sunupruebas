@extends('layouts.app')

@section('content')
    <h1>Lista de Miembros del Equipo en {{ $proyecto->nombre }}</h1>
    <a href="{{ route('proyectos.miembros.create', $proyecto) }}">Agregar Nuevo Miembro</a>

    <ul>
        @foreach ($miembros as $miembro)
            <li>
                <a href="{{ route('proyectos.miembros.edit', [$proyecto, $miembro]) }}">{{ $miembro->nombre }}</a>
                <form action="{{ route('proyectos.miembros.destroy', [$proyecto, $miembro]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
