<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(database_path('seeders/data/personas.json'));
        $data = json_decode($json);

        // Insertar los datos en la base de datos
        foreach ($data as $persona) {
            DB::table('personas')->insert([
                'nombre' => $persona->nombre,
                'apellidos' => $persona->apellidos,
                'edad' => $persona->edad,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
