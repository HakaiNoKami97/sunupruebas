@extends('layouts.app')

@section('content')
    <div x-data="comentariosApp()">
        <h1>Lista de Comentarios</h1>
        
        <form x-show="mostrarFormulario" @submit.prevent="guardarComentario">
            <label for="texto">Comentario:</label>
            <textarea x-model="texto" required></textarea>
            
            <button type="submit" x-text="modoEdicion ? 'Actualizar' : 'Crear'"></button>
            <button type="button" x-show="modoEdicion" @click="cancelarEdicion">Cancelar</button>
        </form>
        
        <button @click="mostrarFormulario = !mostrarFormulario">Nuevo Comentario</button>
        
        <ul>
            <li x-for="comentario in comentarios">
                <span x-text="comentario.texto"></span>
                <button @click="editarComentario(comentario)">Editar</button>
                <button @click="eliminarComentario(comentario)">Eliminar</button>
            </li>
        </ul>
    </div>
    
    <script>
        function comentariosApp() {
            return {
                comentarios: @json($comentarios),
                mostrarFormulario: false,
                modoEdicion: false,
                comentarioId: null,
                texto: '',
                
                guardarComentario() {
                    if (this.modoEdicion) {
                        // Lógica para actualizar el comentario
                    } else {
                        // Lógica para crear un nuevo comentario
                    }
                    this.limpiarCampos();
                },
                
                editarComentario(comentario) {
                    this.comentarioId = comentario.id;
                    this.texto = comentario.texto;
                    this.mostrarFormulario = true;
                    this.modoEdicion = true;
                },
                
                eliminarComentario(comentario) {
                    // Lógica para eliminar el comentario
                },
                
                cancelarEdicion() {
                    this.limpiarCampos();
                    this.mostrarFormulario = false;
                    this.modoEdicion = false;
                },
                
                limpiarCampos() {
                    this.texto = '';
                    this.comentarioId = null;
                }
            };
        }
    </script>
@endsection
