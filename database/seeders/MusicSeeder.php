<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('music')->insert([
                'title'=>"AC/DC — Highway to Hell",
                'song'=>'sounds/AC_DC — Highway to Hell.mp3'
            ]
        );
        DB::table('music')->insert([
                'title'=>"5 Seconds Of Summer - Youngblood",
                'song'=>'sounds/5SOS_Youngblood.mp3'
            ]
        );
        DB::table('music')->insert([
                'title'=>'Droeloe - Looking Back',
                'song'=>'sounds/Droeloe-LookingBack.mp3'
            ]
        );
    }
}
