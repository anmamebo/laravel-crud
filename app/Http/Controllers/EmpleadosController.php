<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationMessages;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    public function index(): View
    {
        $empleados = Empleado::paginate(12);

        return view('empleados.index', compact('empleados'));
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|max:99|min:0',
            'telefonos.*' => 'required|regex:/^\d{9}$/',
            'horas_trabajadas' => 'required|numeric|min:0',
            'precio_por_hora' => 'required|numeric|min:0'
        ], ValidationMessages::messages());

        try {
            DB::beginTransaction();

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

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el empleado');
        }

        return back()->with('mensaje', 'Empleado creado exitosamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Empleado $empleado, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|max:99|min:0',
            'telefonos.*' => 'required|regex:/^\d{9}$/',
            'horas_trabajadas' => 'required|numeric|min:0',
            'precio_por_hora' => 'required|numeric|min:0'
        ], ValidationMessages::messages());

        try {
            DB::beginTransaction();

            $persona_id = $empleado->trabajador->persona->id;
            Persona::where('id', $persona_id)->update([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'edad' => $request->edad,
            ]);

            $trabajador_id = $empleado->trabajador->id;
            Trabajador::where('id', $trabajador_id)->update([]);


            $empleado->trabajador->telefonos->each(function ($telefono) {
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

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al editar el empleado');
        }

        return back()->with('mensaje', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        try {
            DB::beginTransaction();

            $persona = $empleado->trabajador->persona;
            $trabajador = $empleado->trabajador;

            $telefonos = $trabajador->telefonos;

            foreach ($telefonos as $telefono) {
                $telefono->delete();
            }

            $empleado->delete();
            $trabajador->delete();
            $persona->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar empleado');
        }

        return back()->with('mensaje', 'Empleado eliminado.');
    }
}
