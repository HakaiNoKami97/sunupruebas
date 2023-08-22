<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Proyecto;

class Proyectos extends Component
{
    public $proyecto, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $estado;

    public function render()
    {
        $proyectos = Proyecto::all();
        return view('livewire.proyectos', compact('proyectos'));
    }

    public function crearProyecto()
    {
        Proyecto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => $this->estado,
        ]);
        $this->limpiarCampos();
    }

    public function editarProyecto(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto;
        $this->nombre = $proyecto->nombre;
        $this->descripcion = $proyecto->descripcion;
        $this->fecha_inicio = $proyecto->fecha_inicio;
        $this->fecha_fin = $proyecto->fecha_fin;
        $this->estado = $proyecto->estado;
    }

    public function actualizarProyecto()
    {
        $this->proyecto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'estado' => $this->estado,
        ]);
        $this->limpiarCampos();
    }

    public function eliminarProyecto(Proyecto $proyecto)
    {
        $proyecto->delete();
    }

    private function limpiarCampos()
    {
        $this->nombre = $this->descripcion = $this->fecha_inicio = $this->fecha_fin = $this->estado = '';
    }
}

