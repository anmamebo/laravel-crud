<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TrabajadorsController extends Controller
{
    public function index(): View
    {
        $trabajadores = Trabajador::paginate(12);

        return view('trabajadores.index', compact('trabajadores'));
    }
}
