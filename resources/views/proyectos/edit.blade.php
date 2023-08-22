@extends('layouts.app')

@section('content')
    <h1>Editar Proyecto: {{ $proyecto->nombre }}</h1>

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $proyecto->nombre }}" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Actualizar Proyecto</button>
    </form>
@endsection
