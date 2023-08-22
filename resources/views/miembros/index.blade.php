@extends('layouts.app')

@section('content')
    <div x-data="miembrosApp()">
        <h1>Lista de Miembros del Equipo en {{ $proyecto->nombre }}</h1>
        
        <form x-show="mostrarFormulario" @submit.prevent="guardarMiembro">
            <label for="nombre">Nombre:</label>
            <input type="text" x-model="nombre" required>
            <label for="rol">Rol:</label>
            <input type="text" x-model="rol" required>
            <label for="contacto">Contacto:</label>
            <input type="text" x-model="contacto" required>
            
            <button type="submit" x-text="modoEdicion ? 'Actualizar' : 'Crear'"></button>
            <button type="button" x-show="modoEdicion" @click="cancelarEdicion">Cancelar</button>
        </form>
        
        <button @click="mostrarFormulario = !mostrarFormulario">Nuevo Miembro</button>
        
        <ul>
            <li x-for="miembro in miembros">
                <span x-text="miembro.nombre"></span>
                <button @click="editarMiembro(miembro)">Editar</button>
                <button @click="eliminarMiembro(miembro)">Eliminar</button>
            </li>
        </ul>
    </div>
    
    <script>
        function miembrosApp() {
            return {
                miembros: @json($miembros),
                mostrarFormulario: false,
                modoEdicion: false,
                miembroId: null,
                nombre: '',
                rol: '',
                contacto: '',
                
                guardarMiembro() {
                    if (this.modoEdicion) {
                        // Lógica para actualizar el miembro
                    } else {
                        // Lógica para crear un nuevo miembro
                    }
                    this.limpiarCampos();
                },
                
                editarMiembro(miembro) {
                    this.miembroId = miembro.id;
                    this.nombre = miembro.nombre;
                    this.rol = miembro.rol;
                    this.contacto = miembro.contacto;
                    this.mostrarFormulario = true;
                    this.modoEdicion = true;
                },
                
                eliminarMiembro(miembro) {
                    // Lógica para eliminar el miembro
                },
                
                cancelarEdicion() {
                    this.limpiarCampos();
                    this.mostrarFormulario = false;
                    this.modoEdicion = false;
                },
                
                limpiarCampos() {
                    this.nombre = '';
                    this.rol = '';
                    this.contacto = '';
                    this.miembroId = null;
                }
            };
        }
    </script>
@endsection
