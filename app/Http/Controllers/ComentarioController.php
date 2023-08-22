<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Tarea;
use App\Comentario;

class ComentarioController extends Controller
{
    public function indexProyecto(Proyecto $proyecto)
    {
        $comentarios = $proyecto->comentarios;
        return view('comentarios.index', compact('proyecto', 'comentarios'));
    }

    public function indexTarea(Proyecto $proyecto, Tarea $tarea)
    {
        $comentarios = $tarea->comentarios;
        return view('comentarios.index', compact('proyecto', 'tarea', 'comentarios'));
    }

    public function createProyecto(Proyecto $proyecto)
    {
        return view('comentarios.create', compact('proyecto'));
    }

    public function createTarea(Proyecto $proyecto, Tarea $tarea)
    {
        return view('comentarios.create', compact('proyecto', 'tarea'));
    }

    public function storeProyecto(Request $request, Proyecto $proyecto)
    {
        $proyecto->comentarios()->create($request->all());
        return redirect()->route('proyectos.comentarios.index', $proyecto);
    }

    public function storeTarea(Request $request, Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->comentarios()->create($request->all());
        return redirect()->route('proyectos.tareas.comentarios.index', [$proyecto, $tarea]);
    }

    public function editProyecto(Proyecto $proyecto, Comentario $comentario)
    {
        return view('comentarios.edit', compact('proyecto', 'comentario'));
    }

    public function editTarea(Proyecto $proyecto, Tarea $tarea, Comentario $comentario)
    {
        return view('comentarios.edit', compact('proyecto', 'tarea', 'comentario'));
    }

    public function updateProyecto(Request $request, Proyecto $proyecto, Comentario $comentario)
    {
        $comentario->update($request->all());
        return redirect()->route('proyectos.comentarios.index', $proyecto);
    }

    public function updateTarea(Request $request, Proyecto $proyecto, Tarea $tarea, Comentario $comentario)
    {
        $comentario->update($request->all());
        return redirect()->route('proyectos.tareas.comentarios.index', [$proyecto, $tarea]);
    }

    public function destroyProyecto(Proyecto $proyecto, Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('proyectos.comentarios.index', $proyecto);
    }

    public function destroyTarea(Proyecto $proyecto, Tarea $tarea, Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('proyectos.tareas.comentarios.index', [$proyecto, $tarea]);
    }
}

