<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          'Informática',
          'Beleza',
          'Roupa',
          'Material Escolar',
          'Esporte',
          'Calçados',
        ];

        foreach ($data AS $row){
            DB::table('categorias')->insert([
                'nome' => $row,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
