<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GerentesController extends Controller
{
    public function index(): View
    {
        $gerentes = Gerente::all();

        return view('gerentes.index', compact('gerentes'));
    }

    public function create()
    {
        return view('gerentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'salario' => 'required|numeric'
        ]);

        $persona = Persona::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
        ]);

        $trabajador = Trabajador::create([
            'persona_id' => $persona->id,
        ]);

        $gerente = Gerente::create([
            'salario' => $request->salario,
            'trabajador_id' => $trabajador->id,
        ]);

        return back()->with('mensaje', 'Gerente creado exitosamente');
    }

    public function edit(Gerente $gerente)
    {
        return view('gerentes.edit', compact('gerente'));
    }

    public function update(Gerente $gerente, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'salario' => 'required|numeric'
        ]);

        $persona_id = $gerente->trabajador->persona->id;
        Persona::where('id', $persona_id)->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
        ]);

        $trabajador_id = $gerente->trabajador->id;
        Trabajador::where('id', $trabajador_id)->update([]);

        $gerente_id = $gerente->id;
        Gerente::where('id', $gerente_id)->update([
            'salario' => $request->salario,
        ]);
        
        return back()->with('mensaje', 'Gerente actualizado exitosamente');
    }

    public function destroy(Gerente $gerente)
    {
        $persona = $gerente->trabajador->persona;
        $trabajador = $gerente->trabajador;

        $gerente->delete();
        $trabajador->delete();
        $persona->delete();

        return back()->with('mensaje', 'Gerente eliminado.');
    }
}
