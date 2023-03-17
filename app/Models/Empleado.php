<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Trabajador
{
    use HasFactory;

    public function trabajador() 
    {
        return $this->belongsTo(Trabajador::class);
    }
}
