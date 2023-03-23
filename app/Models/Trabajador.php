<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Trabajador extends Persona
{
    use HasFactory;

    protected $fillable = ['telefonos', 'persona_id'];

    /**
     * Obtiene los teléfonos del trabajador.
     */
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }

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
        if ($this->calcularSueldo() > 2000) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerRol() {
        if ($this->empleado != null) {
            return "Empleado";
        } else if ($this->gerente != null) {
            return "Gerente";
        } else {
            return null;
        }
    }
}
