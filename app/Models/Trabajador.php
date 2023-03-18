<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Trabajador extends Persona
{
    use HasFactory;

    protected $fillable = ['telefonos', 'persona_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function gerente()
    {
        return $this->hasOne(Gerente::class);
    }

    public function calcularSueldo()
    {
        if ($this->empleado != null) {
            return $this->empleado->calcularSueldo();
        } else if ($this->gerente != null) {
            return $this->gerente->calcularSueldo();
        } else {
            return null;
        }
    }

    public function debePagarImpuestos(): bool
    {
        return true;
    }
}
