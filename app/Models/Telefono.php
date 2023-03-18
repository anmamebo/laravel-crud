<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $fillable = ['numero_telefono', 'trabajador_id'];

    /**
     * Obtiene el Trabajador al que pertenece el Telefono
     */
    public function trabajador()
    {
        return $this -> belongsTo(Trabajador::class);
    }
}
