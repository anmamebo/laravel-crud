<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GerentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(database_path('seeders/data/gerentes.json'));
        $data = json_decode($json);

        // Insertar los datos en la base de datos
        foreach ($data as $gerente) {
            DB::table('gerentes')->insert([
                'id' => $gerente->id,
                'salario' => $gerente->salario,
                'trabajador_id' => $gerente->trabajador_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
