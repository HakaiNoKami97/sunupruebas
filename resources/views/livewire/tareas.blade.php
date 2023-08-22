<div>
    <h1>Lista de Tareas en {{ $proyecto->nombre }}</h1>
    <form wire:submit.prevent="{{ $tarea ? 'actualizarTarea' : 'crearTarea' }}">
        <label for="nombre">Nombre:</label>
        <input type="text" wire:model="nombre" required>
        <label for="descripcion">Descripción:</label>
        <textarea wire:model="descripcion" required></textarea>
        <label for="estado">Estado:</label>
        <input type="text" wire:model="estado" required>
        <label for="fecha_limite">Fecha Límite:</label>
        <input type="date" wire:model="fecha_limite" required>
        <label for="asignado_a">Asignado a:</label>
        <input type="text" wire:model="asignado_a" required>
        <button type="submit">{{ $tarea ? 'Actualizar' : 'Crear' }}</button>
        @if ($tarea)
            <button wire:click="limpiarCampos" type="button">Cancelar</button>
        @endif
    </form>

    <ul>
        @foreach ($tareas as $tarea)
            <li>
                {{ $tarea->nombre }}
                <button wire:click="editarTarea({{ $tarea->id }})" type="button">Editar</button>
                <button wire:click="eliminarTarea({{ $tarea->id }})" type="button">Eliminar</button>
            </li>
        @endforeach
    </ul>
</div>

