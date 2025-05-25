<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            'nombre' => 'Accion',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'Survival',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'MOBA',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'Puzzles',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'FPS',
        ]);
    }
}
