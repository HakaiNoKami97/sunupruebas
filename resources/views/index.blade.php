@extends('layouts.app')

@section('content')
    <livewire:proyectos />
@endsection

@section('content')
    <livewire:tareas :proyecto="$proyecto" />
@endsection

@section('content')
    <livewire:miembros-equipo :proyecto="$proyecto" />
@endsection

@section('content')
    <livewire:comentarios :proyecto="$proyecto" :tarea="$tarea" />
@endsection


