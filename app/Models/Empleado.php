<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Trabajador
{
    use HasFactory;

    protected $fillable = ['horas_trabajadas', 'precio_por_hora', 'trabajador_id'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }

    public function calcularSueldo()
    {
        $sueldo = $this->horas_trabajadas * $this->precio_por_hora;

        return $sueldo;
    }
}
