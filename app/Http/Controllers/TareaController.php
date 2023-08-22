<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Tarea;

class TareaController extends Controller
{
    public function index(Proyecto $proyecto)
    {
        $tareas = $proyecto->tareas;
        return view('tareas.index', compact('proyecto', 'tareas'));
    }

    public function create(Proyecto $proyecto)
    {
        return view('tareas.create', compact('proyecto'));
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        $proyecto->tareas()->create($request->all());
        return redirect()->route('proyectos.tareas.index', $proyecto);
    }

    public function edit(Proyecto $proyecto, Tarea $tarea)
    {
        return view('tareas.edit', compact('proyecto', 'tarea'));
    }

    public function update(Request $request, Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->update($request->all());
        return redirect()->route('proyectos.tareas.index', $proyecto);
    }

    public function destroy(Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('proyectos.tareas.index', $proyecto);
    }
}

