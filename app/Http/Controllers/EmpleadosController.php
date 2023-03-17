<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index(): View
    {
        return view('empleados.index', [
            'empleados' => Empleado::all()
        ]);
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required|string',
            'apellidos'=>'required|string',
            'edad'=>'required|integer',
            'horasTrabajadas'=>'required|numeric',
            'precioPorHora'=>'required|numeric'
        ]);

        $empleado = new Empleado;
        $empleado->horasTrabajadas = $request->horasTrabajadas;
        $empleado->precioPorHora = $request->precioPorHora;

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->edad = $request->edad;
        $persona->save();

        $trabajador = new Trabajador();
        $trabajador->persona_id = $persona->id;
        $trabajador->save();

        $empleado->trabajador_id = $trabajador->id;
        $empleado->save();

        return back()->with('mensaje', 'Empleado creado exitosamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Empleado $empleado, Request $request)
    {
        $request->validate([
            'nombre'=> 'required|string',
            'apellidos'=>'required|string',
            'edad'=>'required|integer',
            'horasTrabajadas'=>'required|numeric',
            'precioPorHora'=>'required|numeric'
        ]);

        $empleado->horasTrabajadas = $request->horasTrabajadas;
        $empleado->precioPorHora = $request->precioPorHora;

        $persona = Persona::find($empleado->trabajador->persona->id);
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->edad = $request->edad;
        $persona->save();

        $trabajador = $empleado->trabajador;
        $trabajador->save();

        $empleado->save();

        return back()->with('mensaje', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        $persona = $empleado->trabajador->persona;
        $trabajador = $empleado->trabajador;

        $empleado->delete();
        $trabajador->delete();
        $persona->delete();

        return back()->with('mensaje', 'Empleado eliminado.');
    }
}
