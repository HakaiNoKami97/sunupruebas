<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Proyecto;
use App\MiembroDelEquipo;

class MiembrosEquipo extends Component
{
    public $proyecto, $miembro, $nombre, $rol, $contacto;

    public function render()
    {
        $miembros = $this->proyecto->miembrosDelEquipo;
        return view('livewire.miembros-equipo', compact('miembros'));
    }

    public function crearMiembro()
    {
        $this->proyecto->miembrosDelEquipo()->create([
            'nombre' => $this->nombre,
            'rol' => $this->rol,
            'contacto' => $this->contacto,
        ]);
        $this->limpiarCampos();
    }

    public function editarMiembro(MiembroDelEquipo $miembro)
    {
        $this->miembro = $miembro;
        $this->nombre = $miembro->nombre;
        $this->rol = $miembro->rol;
        $this->contacto = $miembro->contacto;
    }

    public function actualizarMiembro()
    {
        $this->miembro->update([
            'nombre' => $this->nombre,
            'rol' => $this->rol,
            'contacto' => $this->contacto,
        ]);
        $this->limpiarCampos();
    }

    public function eliminarMiembro(MiembroDelEquipo $miembro)
    {
        $miembro->delete();
    }

    private function limpiarCampos()
    {
        $this->nombre = $this->rol = $this->contacto = '';
    }
}

