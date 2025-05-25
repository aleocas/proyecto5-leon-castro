<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideojuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videojuegos')->insert([
            'nombre' => 'Valorant',
            'desarrollador' => 'Riot Games',
            'anio_lanzamiento' => '2019-10-30',
            'imagen' => 'videojuegos/valorant.png'
        ]);
        DB::table('videojuegos')->insert([
            'nombre' => 'League of Legends',
            'desarrollador' => 'Riot Games',
            'anio_lanzamiento' => '2009-10-27',
            'imagen' => 'videojuegos/lol.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Minecraft',
            'desarrollador' => 'Mojang',
            'anio_lanzamiento' => '2011-11-18',
            'imagen' => 'videojuegos/minecraft.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Fortnite',
            'desarrollador' => 'Epic Games',
            'anio_lanzamiento' => '2017-07-25',
            'imagen' => 'videojuegos/fortnite.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Among Us',
            'desarrollador' => 'Innersloth',
            'anio_lanzamiento' => '2018-06-15',
            'imagen' => 'videojuegos/among.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Counter-Strike: Global Offensive',
            'desarrollador' => 'Valve Corporation',
            'anio_lanzamiento' => '2012-08-21',
            'imagen' => 'videojuegos/csgo.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Apex Legends',
            'desarrollador' => 'Respawn Entertainment',
            'anio_lanzamiento' => '2019-02-04',
            'imagen' => 'videojuegos/apex.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Overwatch',
            'desarrollador' => 'Blizzard Entertainment',
            'anio_lanzamiento' => '2016-05-24',
            'imagen' => 'videojuegos/overwatch.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'The Witcher 3: Wild Hunt',
            'desarrollador' => 'CD Projekt Red',
            'anio_lanzamiento' => '2015-05-19',
            'imagen' => 'videojuegos/thewitcher3.png'
        ]);
        
        DB::table('videojuegos')->insert([
            'nombre' => 'Call of Duty: Warzone',
            'desarrollador' => 'Infinity Ward',
            'anio_lanzamiento' => '2020-03-10',
            'imagen' => 'videojuegos/warzone.png'
        ]);        
    }
}
