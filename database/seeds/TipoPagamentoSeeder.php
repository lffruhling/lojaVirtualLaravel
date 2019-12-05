<?php

use Illuminate\Database\Seeder;

class TipoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pagamentos')->insert([
            'nome' => "Boleto",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_pagamentos')->insert([
            'nome' => "Cartão de Credito",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_pagamentos')->insert([
            'nome' => "Deposito",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
