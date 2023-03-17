<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function personas(): View
    {
        return view('index', [
            'personas' => Persona::all()
        ]);
    }
}
