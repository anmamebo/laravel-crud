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
        return view('gerentes.index', [
            'gerentes' => Gerente::all()
        ]);
    }

    public function create()
    {
        return view('gerentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required|string',
            'apellidos'=>'required|string',
            'edad'=>'required|integer',
            'salario'=>'required|numeric'
        ]);

        $gerente = new Gerente;
        $gerente->salario = $request->salario;

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->edad = $request->edad;
        $persona->save();

        $trabajador = new Trabajador();
        $trabajador->persona_id = $persona->id;
        $trabajador->save();

        $gerente->trabajador_id = $trabajador->id;
        $gerente->save();

        return back()->with('mensaje', 'Gerente creado exitosamente');
    }

    public function edit(Gerente $gerente)
    {
        return view('gerentes.edit', compact('gerente'));
    }

    public function update(Gerente $gerente, Request $request)
    {
        $request->validate([
            'nombre'=> 'required|string',
            'apellidos'=>'required|string',
            'edad'=>'required|integer',
            'salario'=>'required|numeric'
        ]);

        $gerente->salario = $request->salario;

        $persona = Persona::find($gerente->trabajador->persona->id);
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->edad = $request->edad;
        $persona->save();

        $trabajador = $gerente->trabajador;
        $trabajador->save();

        $gerente->save();

        return back()->with('mensaje', 'Gerente actualizado exitosamente');
    }
}
