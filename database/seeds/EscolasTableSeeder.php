<?php

use Illuminate\Database\Seeder;

class EscolasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escolas = [
            'ESTG',
            'ESECS',
            'ESTM',
            'ESSLEI',
        ];

        foreach ($escolas as $escola) {
            DB::table('escolas')->insert([
                'nome' => $escola,
            ]);
        }
    }
}
