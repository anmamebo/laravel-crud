<?php

namespace App\Helpers;

class ValidationMessages
{
    public static function messages(): array
    {
        return [
            'nombre.required' => 'Nombre requerido',
            'nombre.string' => 'Nombre debe ser una cadena de texto',
            'nombre.max' => 'Nombre debe tener máximo 255 caracteres',
            'apellidos.required' => 'Apellidos requeridos',
            'apellidos.string' => 'Apellidos debe ser una cadena de texto',
            'apellidos.max' => 'Apellidos debe tener máximo 255 caracteres',
            'edad.required' => 'Edad requerida',
            'edad.integer' => 'Edad debe ser un número entero',
            'edad.max' => 'Edad máxima 99 años',
            'edad.min' => 'Edad mínima 0 años',
            'telefonos.*.required' => 'Teléfono requerido',
            'telefonos.*.regex' => 'Teléfono no cumple con el formato requerido de 9 cifras',
            'horas_trabajadas.required' => 'Horas trabajadas requeridas',
            'horas_trabajadas.numeric' => 'Horas trabajadas debe ser un valor numérico',
            'horas_trabajadas.min' => 'Horas trabajadas mínimas 0',
            'precio_por_hora.required' => 'Precio por hora requerido',
            'precio_por_hora.numeric' => 'Precio por hora debe ser un valor numérico',
            'precio_por_hora.min' => 'Precio por hora mínimo 0',
            'salario.required' => 'Salario requerido',
            'salario.numeric' => 'Salario debe ser un valor numérico',
            'salario.min' => 'Salario mínimo 0',
        ];
    }
}