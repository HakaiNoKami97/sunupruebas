<div>
    <h1>Lista de Comentarios</h1>
    <form wire:submit.prevent="{{ $comentario ? 'actualizarComentario' : 'crearComentario' }}">
        <label for="texto">Comentario:</label>
        <textarea wire:model="texto" required></textarea>
        <button type="submit">{{ $comentario ? 'Actualizar' : 'Crear' }}</button>
        @if ($comentario)
            <button wire:click="limpiarCampos" type="button">Cancelar</button>
        @endif
    </form>

    <ul>
        @foreach ($comentarios as $comentario)
            <li>
                {{ $comentario->texto }}
                <button wire:click="editarComentario({{ $comentario->id }})" type="button">Editar</button>
                <button wire:click="eliminarComentario({{ $comentario->id }})" type="button">Eliminar</button>
            </li>
        @endforeach
    </ul>
</div>
