<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelefonosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(database_path('seeders/data/telefonos.json'));
        $data = json_decode($json);

        // Insertar los datos en la base de datos
        foreach ($data as $telefono) {
            DB::table('telefonos')->insert([
                'id' => $telefono->id,
                'numero_telefono' => $telefono->numero_telefono,
                'trabajador_id' => $telefono->trabajador_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
