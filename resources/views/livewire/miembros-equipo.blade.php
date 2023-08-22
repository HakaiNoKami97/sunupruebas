<div>
    <h1>Lista de Miembros del Equipo en {{ $proyecto->nombre }}</h1>
    <form wire:submit.prevent="{{ $miembro ? 'actualizarMiembro' : 'crearMiembro' }}">
        <label for="nombre">Nombre:</label>
        <input type="text" wire:model="nombre" required>
        <label for="rol">Rol:</label>
        <input type="text" wire:model="rol" required>
        <label for="contacto">Contacto:</label>
        <input type="text" wire:model="contacto" required>
        <button type="submit">{{ $miembro ? 'Actualizar' : 'Crear' }}</button>
        @if ($miembro)
            <button wire:click="limpiarCampos" type="button">Cancelar</button>
        @endif
    </form>

    <ul>
        @foreach ($miembros as $miembro)
            <li>
                {{ $miembro->nombre }}
                <button wire:click="editarMiembro({{ $miembro->id }})" type="button">Editar</button>
                <button wire:click="eliminarMiembro({{ $miembro->id }})" type="button">Eliminar</button>
            </li>
        @endforeach
    </ul>
</div>
