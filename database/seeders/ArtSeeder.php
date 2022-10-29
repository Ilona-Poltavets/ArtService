<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('art')->insert([
            'title'=>"Test",
                'img'=>'images/756627.jpg'
            ]
        );
        DB::table('art')->insert([
                'title'=>"Seasons",
                'img'=>'images/15.jpg'
            ]
        );
        DB::table('art')->insert([
                'title'=>'BMW M4 Signal Green',
                'img'=>'images/153189236903.jpg'
            ]
        );
    }
}
