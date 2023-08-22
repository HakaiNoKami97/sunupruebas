<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Proyecto;
use App\Tarea;

class Tareas extends Component
{
    public $proyecto, $tarea, $nombre, $descripcion, $estado, $fecha_limite, $asignado_a;

    public function render()
    {
        $tareas = $this->proyecto->tareas;
        return view('livewire.tareas', compact('tareas'));
    }

    public function crearTarea()
    {
        $this->proyecto->tareas()->create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'fecha_limite' => $this->fecha_limite,
            'asignado_a' => $this->asignado_a,
        ]);
        $this->limpiarCampos();
    }

    public function editarTarea(Tarea $tarea)
    {
        $this->tarea = $tarea;
        $this->nombre = $tarea->nombre;
        $this->descripcion = $tarea->descripcion;
        $this->estado = $tarea->estado;
        $this->fecha_limite = $tarea->fecha_limite;
        $this->asignado_a = $tarea->asignado_a;
    }

    public function actualizarTarea()
    {
        $this->tarea->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'fecha_limite' => $this->fecha_limite,
            'asignado_a' => $this->asignado_a,
        ]);
        $this->limpiarCampos();
    }

    public function eliminarTarea(Tarea $tarea)
    {
        $tarea->delete();
    }

    private function limpiarCampos()
    {
        $this->nombre = $this->descripcion = $this->estado = $this->fecha_limite = $this->asignado_a = '';
    }
}

