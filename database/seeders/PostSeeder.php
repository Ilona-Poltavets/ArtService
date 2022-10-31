<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'Harry Potter',
            'category'=>'literature',
            'pathFile'=>'files/2/Гарри_Поттер_и_философский_камень.pdf',
            'user_id'=>'2',
        ]);
        DB::table('posts')->insert([
            'title'=>'AC/DC — Highway to Hell',
            'category'=>'sound',
            'pathFile'=>'sounds/2/AC_DC — Highway to Hell.mp3',
            'user_id'=>'2',
        ]);
        DB::table('posts')->insert([
            'title'=>'Seasons',
            'category'=>'art',
            'pathFile'=>'images/2/15.jpg',
            'user_id'=>'2',
        ]);
    }
}
