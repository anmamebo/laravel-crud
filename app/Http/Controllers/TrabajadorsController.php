<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationMessages;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Models\Persona;
use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorsController extends Controller
{
    public function index(): View
    {
        $trabajadores = Trabajador::paginate(12);

        return view('trabajadores.index', compact('trabajadores'));
    }

    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|max:99|min:0',
            'telefonos.*' => 'required|regex:/^\d{9}$/',
            'rol' => 'required',
        ], ValidationMessages::messages());

        if ($request->rol == 1) {
            $request->validate([
                'horas_trabajadas' => 'required|numeric|min:0',
                'precio_por_hora' => 'required|numeric|min:0'
            ], ValidationMessages::messages());
        } else if ($request->rol == 2) {
            $request->validate([
                'salario' => 'required|numeric|min:0'
            ], ValidationMessages::messages());
        }

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

            if ($request->rol == 1) {
                $empleado = Empleado::create([
                    'horas_trabajadas' => $request->horas_trabajadas,
                    'precio_por_hora' => $request->precio_por_hora,
                    'trabajador_id' => $trabajador->id,
                ]);
            } else if ($request->rol == 2) {
                $gerente = Gerente::create([
                    'salario' => $request->salario,
                    'trabajador_id' => $trabajador->id,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el trabajador');
        }

        return back()->with('mensaje', 'Trabajador creado exitosamente');
    }
}
