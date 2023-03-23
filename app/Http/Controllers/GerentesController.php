<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationMessages;

use App\Models\Gerente;
use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GerentesController extends Controller
{
    public function index(): View
    {
        $gerentes = Gerente::paginate(12);

        return view('gerentes.index', compact('gerentes'));
    }

    public function show(Gerente $gerente)
    {
        return view('gerentes.show', compact('gerente'));
    }

    public function create()
    {
        return view('gerentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|max:99|min:0',
            'telefonos.*' => 'required|regex:/^\d{9}$/',
            'salario' => 'required|numeric|min:0'
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

            $gerente = Gerente::create([
                'salario' => $request->salario,
                'trabajador_id' => $trabajador->id,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el gerente');
        }

        return back()->with('mensaje', 'Gerente creado exitosamente');
    }

    public function edit(Gerente $gerente)
    {
        return view('gerentes.edit', compact('gerente'));
    }

    public function update(Gerente $gerente, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|max:99|min:0',
            'telefonos.*' => 'required|regex:/^\d{9}$/',
            'salario' => 'required|numeric|min:0'
        ], ValidationMessages::messages());

        try {
            DB::beginTransaction();

            $persona_id = $gerente->trabajador->persona->id;
            Persona::where('id', $persona_id)->update([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'edad' => $request->edad,
            ]);

            $trabajador_id = $gerente->trabajador->id;
            Trabajador::where('id', $trabajador_id)->update([]);

            $gerente->trabajador->telefonos->each(function ($telefono) {
                $telefono->delete();
            });
            if (!empty($request->telefonos)) {
                foreach ($request->telefonos as $telefono) {
                    $gerente->trabajador->telefonos()->create(['numero_telefono' => $telefono]);
                }
            }

            $gerente_id = $gerente->id;
            Gerente::where('id', $gerente_id)->update([
                'salario' => $request->salario,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al editar el gerente');
        }

        return back()->with('mensaje', 'Gerente actualizado exitosamente');
    }

    public function destroy(Gerente $gerente)
    {
        try {
            DB::beginTransaction();

            $persona = $gerente->trabajador->persona;
            $trabajador = $gerente->trabajador;

            $telefonos = $trabajador->telefonos;

            foreach ($telefonos as $telefono) {
                $telefono->delete();
            }

            $gerente->delete();
            $trabajador->delete();
            $persona->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar gerente');
        }

        return back()->with('mensaje', 'Gerente eliminado.');
    }
}
