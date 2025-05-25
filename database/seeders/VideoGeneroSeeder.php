<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '1',
            'genero_id' => '5',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '1',
            'genero_id' => '3',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '2',
            'genero_id' => '3',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '3',
            'genero_id' => '1',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '3',
            'genero_id' => '2',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '3',
            'genero_id' => '4',
        ]);
        DB::table('videojuego_genero')->insert([
            'videojuego_id' => '9',
            'genero_id' => '2',
        ]);
    }
}
