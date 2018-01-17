<?php

use Illuminate\Database\Seeder;

class UCsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ucs')->insert([
            'nome' => 'Análise Matemática',
            'ects' => 6,
            'ano' => 1,
            'semestre' => 1,
            'curso_id' => 1,
        ]);
        DB::table('ucs')->insert([
            'nome' => 'Programação I',
            'ects' => 7,
            'ano' => 1,
            'semestre' => 1,
            'curso_id' => 1,
        ]);
        DB::table('ucs')->insert([
            'nome' => 'Programação II',
            'ects' => 7,
            'ano' => 1,
            'semestre' => 2,
            'curso_id' => 1,
        ]);

        DB::table('ucs')->insert([
            'nome' => 'Contabilidade Financeira I',
            'ects' => 6,
            'ano' => 1,
            'semestre' => 1,
            'curso_id' => 2,
        ]);

        
    }
}
