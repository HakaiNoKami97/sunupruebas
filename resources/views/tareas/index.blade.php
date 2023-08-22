@extends('layouts.app')

@section('content')
    <div x-data="tareasApp()">
        <h1>Lista de Tareas en {{ $proyecto->nombre }}</h1>
        
        <form x-show="mostrarFormulario" @submit.prevent="guardarTarea">
            <label for="nombre">Nombre:</label>
            <input type="text" x-model="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea x-model="descripcion" required></textarea>
            <label for="estado">Estado:</label>
            <input type="text" x-model="estado" required>
            <label for="fecha_limite">Fecha Límite:</label>
            <input type="date" x-model="fechaLimite" required>
            <label for="asignado_a">Asignado a:</label>
            <input type="text" x-model="asignadoA" required>
            
            <button type="submit" x-text="modoEdicion ? 'Actualizar' : 'Crear'"></button>
            <button type="button" x-show="modoEdicion" @click="cancelarEdicion">Cancelar</button>
        </form>
        
        <button @click="mostrarFormulario = !mostrarFormulario">Nueva Tarea</button>
        
        <ul>
            <li x-for="tarea in tareas">
                <span x-text="tarea.nombre"></span>
                <button @click="editarTarea(tarea)">Editar</button>
                <button @click="eliminarTarea(tarea)">Eliminar</button>
            </li>
        </ul>
    </div>
    
    <script>
        function tareasApp() {
            return {
                tareas: @json($tareas),
                mostrarFormulario: false,
                modoEdicion: false,
                tareaId: null,
                nombre: '',
                descripcion: '',
                estado: '',
                fechaLimite: '',
                asignadoA: '',
                
                guardarTarea() {
                    if (this.modoEdicion) {
                        // Lógica para actualizar la tarea
                    } else {
                        // Lógica para crear una nueva tarea
                    }
                    this.limpiarCampos();
                },
                
                editarTarea(tarea) {
                    this.tareaId = tarea.id;
                    this.nombre = tarea.nombre;
                    this.descripcion = tarea.descripcion;
                    this.estado = tarea.estado;
                    this.fechaLimite = tarea.fecha_limite;
                    this.asignadoA = tarea.asignado_a;
                    this.mostrarFormulario = true;
                    this.modoEdicion = true;
                },
                
                eliminarTarea(tarea) {
                    // Lógica para eliminar la tarea
                },
                
                cancelarEdicion() {
                    this.limpiarCampos();
                    this.mostrarFormulario = false;
                    this.modoEdicion = false;
                },
                
                limpiarCampos() {
                    this.nombre = '';
                    this.descripcion = '';
                    this.estado = '';
                    this.fechaLimite = '';
                    this.asignadoA = '';
                    this.tareaId = null;
                }
            };
        }
    </script>
@endsection
