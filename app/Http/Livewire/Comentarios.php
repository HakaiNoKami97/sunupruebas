<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Proyecto;
use App\Tarea;
use App\Comentario;

class Comentarios extends Component
{
    public $proyecto, $tarea, $comentario, $texto;

    public function render()
    {
        $comentarios = $this->tarea ? $this->tarea->comentarios : $this->proyecto->comentarios;
        return view('livewire.comentarios', compact('comentarios'));
    }

    public function crearComentario()
    {
        if ($this->tarea) {
            $this->tarea->comentarios()->create([
                'texto' => $this->texto,
            ]);
        } else {
            $this->proyecto->comentarios()->create([
                'texto' => $this->texto,
            ]);
        }
        $this->limpiarCampos();
    }

    public function editarComentario(Comentario $comentario)
    {
        $this->comentario = $comentario;
        $this->texto = $comentario->texto;
    }

    public function actualizarComentario()
    {
        $this->comentario->update([
            'texto' => $this->texto,
        ]);
        $this->limpiarCampos();
    }

    public function eliminarComentario(Comentario $comentario)
    {
        $comentario->delete();
    }

    private function limpiarCampos()
    {
        $this->texto = '';
    }
}

