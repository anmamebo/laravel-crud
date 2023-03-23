<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(database_path('seeders/data/trabajadores.json'));
        $data = json_decode($json);

        // Insertar los datos en la base de datos
        foreach ($data as $trabajador) {
            DB::table('trabajadors')->insert([
                'id' => $trabajador->id,
                'persona_id' => $trabajador->persona_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
