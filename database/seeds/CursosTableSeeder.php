<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'nome' => 'Engenharia Informática',
            'totalECTS' => 180,
            'escola_id' => 1,
        ]);
        DB::table('cursos')->insert([
            'nome' => 'Gestão',
            'totalECTS' => 180,
            'escola_id' => 1,
        ]);
        DB::table('cursos')->insert([
            'nome' => 'Educação Básica',
            'totalECTS' => 180,
            'escola_id' => 2,
        ]);
    }
}
