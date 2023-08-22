@extends('layouts.app')

@section('content')
    <div x-data="proyectosApp()">
        <h1>Lista de Proyectos</h1>
        
        <form x-show="mostrarFormulario" @submit.prevent="guardarProyecto">
            <label for="nombre">Nombre:</label>
            <input type="text" x-model="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea x-model="descripcion" required></textarea>
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" x-model="fechaInicio" required>
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date" x-model="fechaFin" required>
            <label for="estado">Estado:</label>
            <input type="text" x-model="estado" required>
            
            <button type="submit" x-text="modoEdicion ? 'Actualizar' : 'Crear'"></button>
            <button type="button" x-show="modoEdicion" @click="cancelarEdicion">Cancelar</button>
        </form>
        
        <button @click="mostrarFormulario = !mostrarFormulario">Nuevo Proyecto</button>
        
        <ul>
            <li x-for="proyecto in proyectos">
                <span x-text="proyecto.nombre"></span>
                <button @click="editarProyecto(proyecto)">Editar</button>
                <button @click="eliminarProyecto(proyecto)">Eliminar</button>
            </li>
        </ul>
    </div>
    
    <script>
        function proyectosApp() {
            return {
                proyectos: @json($proyectos),
                mostrarFormulario: false,
                modoEdicion: false,
                proyectoId: null,
                nombre: '',
                descripcion: '',
                fechaInicio: '',
                fechaFin: '',
                estado: '',
                
                guardarProyecto() {
                    if (this.modoEdicion) {
                        // Lógica para actualizar el proyecto
                    } else {
                        // Lógica para crear un nuevo proyecto
                    }
                    this.limpiarCampos();
                },
                
                editarProyecto(proyecto) {
                    this.proyectoId = proyecto.id;
                    this.nombre = proyecto.nombre;
                    this.descripcion = proyecto.descripcion;
                    this.fechaInicio = proyecto.fecha_inicio;
                    this.fechaFin = proyecto.fecha_fin;
                    this.estado = proyecto.estado;
                    this.mostrarFormulario = true;
                    this.modoEdicion = true;
                },
                
                eliminarProyecto(proyecto) {
                    // Lógica para eliminar el proyecto
                },
                
                cancelarEdicion() {
                    this.limpiarCampos();
                    this.mostrarFormulario = false;
                    this.modoEdicion = false;
                },
                
                limpiarCampos() {
                    this.nombre = '';
                    this.descripcion = '';
                    this.fechaInicio = '';
                    this.fechaFin = '';
                    this.estado = '';
                    this.proyectoId = null;
                }
            };
        }
    </script>
@endsection
