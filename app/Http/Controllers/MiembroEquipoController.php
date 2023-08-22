<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\MiembroDelEquipo;

class MiembroEquipoController extends Controller
{
    public function index(Proyecto $proyecto)
    {
        $miembros = $proyecto->miembrosDelEquipo;
        return view('miembros.index', compact('proyecto', 'miembros'));
    }

    public function create(Proyecto $proyecto)
    {
        return view('miembros.create', compact('proyecto'));
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        $proyecto->miembrosDelEquipo()->create($request->all());
        return redirect()->route('proyectos.miembros.index', $proyecto);
    }

    public function edit(Proyecto $proyecto, MiembroDelEquipo $miembro)
    {
        return view('miembros.edit', compact('proyecto', 'miembro'));
    }

    public function update(Request $request, Proyecto $proyecto, MiembroDelEquipo $miembro)
    {
        $miembro->update($request->all());
        return redirect()->route('proyectos.miembros.index', $proyecto);
    }

    public function destroy(Proyecto $proyecto, MiembroDelEquipo $miembro)
    {
        $miembro->delete();
        return redirect()->route('proyectos.miembros.index', $proyecto);
    }
}

