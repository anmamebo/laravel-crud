<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Trabajador extends Persona
{
    use HasFactory;

    // protected $table = 'trabajadors';

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Obtiene los teléfonos del trabajador.
     */
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }
}
