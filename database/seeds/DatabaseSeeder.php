<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EscolasTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(UCsTableSeeder::class);
    }
}
