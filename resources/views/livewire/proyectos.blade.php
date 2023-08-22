<div>
    <h1>Lista de Proyectos</h1>
    <form wire:submit.prevent="{{ $proyecto ? 'actualizarProyecto' : 'crearProyecto' }}">
        <label for="nombre">Nombre:</label>
        <input type="text" wire:model="nombre" required>
        <label for="descripcion">Descripción:</label>
        <textarea wire:model="descripcion" required></textarea>
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" wire:model="fecha_inicio" required>
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" wire:model="fecha_fin" required>
        <label for="estado">Estado:</label>
        <input type="text" wire:model="estado" required>
        <button type="submit">{{ $proyecto ? 'Actualizar' : 'Crear' }}</button>
        @if ($proyecto)
            <button wire:click="limpiarCampos" type="button">Cancelar</button>
        @endif
    </form>

    <ul>
        @foreach ($proyectos as $proyecto)
            <li>
                {{ $proyecto->nombre }}
                <button wire:click="editarProyecto({{ $proyecto->id }})" type="button">Editar</button>
                <button wire:click="eliminarProyecto({{ $proyecto->id }})" type="button">Eliminar</button>
            </li>
        @endforeach
    </ul>
</div>

