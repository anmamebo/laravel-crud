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
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'telefonos.*' => 'nullable|regex:/^\d{9}$/',
            'horas_trabajadas' => 'required|numeric',
            'precio_por_hora' => 'required|numeric'
        ]);

        $persona = Persona::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
        ]);

        $trabajador = Trabajador::create([
            'persona_id' => $persona->id,
        ]);

        if (!empty($request->telefonos)) {
            foreach ($request->telefonos as $telefono) {
                $trabajador->telefonos()->create(['numero_telefono' => $telefono]);
            }
        }

        $empleado = Empleado::create([
            'horas_trabajadas' => $request->horas_trabajadas,
            'precio_por_hora' => $request->precio_por_hora,
            'trabajador_id' => $trabajador->id,
        ]);
        
        return back()->with('mensaje', 'Empleado creado exitosamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Empleado $empleado, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'telefonos.*' => 'nullable|regex:/^\d{9}$/',
            'horas_trabajadas' => 'required|numeric',
            'precio_por_hora' => 'required|numeric'
        ]);

        $persona_id = $empleado->trabajador->persona->id;
        Persona::where('id', $persona_id)->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
        ]);

        $trabajador_id = $empleado->trabajador->id;
        Trabajador::where('id', $trabajador_id)->update([]);

        
        $empleado->trabajador->telefonos->each(function($telefono) {
            $telefono->delete();
        });
        if (!empty($request->telefonos)) {
            foreach ($request->telefonos as $telefono) {
                $empleado->trabajador->telefonos()->create(['numero_telefono' => $telefono]);
            }
        }

        $empleado_id = $empleado->id;
        Empleado::where('id', $empleado_id)->update([
            'horas_trabajadas' => $request->horas_trabajadas,
            'precio_por_hora' => $request->precio_por_hora,
        ]);

        return back()->with('mensaje', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        $persona = $empleado->trabajador->persona;
        $trabajador = $empleado->trabajador;

        $telefonos = $trabajador->telefonos;

        foreach($telefonos as $telefono) {
            $telefono->delete();
        }

        $empleado->delete();
        $trabajador->delete();
        $persona->delete();

        return back()->with('mensaje', 'Empleado eliminado.');
    }
}
