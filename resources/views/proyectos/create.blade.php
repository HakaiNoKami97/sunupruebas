@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <!-- Agrega los campos restantes aquí -->
        <button type="submit">Crear Proyecto</button>
    </form>
@endsection
