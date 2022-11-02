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
            'avr_mark_complexity'=>1,
            'avr_mark_creativity'=>5,
            'avr_mark_innovativeness'=>2,
            'rating'=>2.6,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('posts')->insert([
            'title'=>'Red Hot Chili Peppers - Dark Necessities',
            'category'=>'music',
            'pathFile'=>'sounds/2/Red Hot Chili Peppers - Dark Necessities.mp3',
            'user_id'=>'2',
            'avr_mark_complexity'=>3,
            'avr_mark_creativity'=>4,
            'avr_mark_innovativeness'=>2,
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s",1650854483)
        ]);
        DB::table('posts')->insert([
            'title'=>'Seasons',
            'category'=>'art',
            'pathFile'=>'images/2/15.jpg',
            'user_id'=>'2',
            'avr_mark_complexity'=>3,
            'avr_mark_creativity'=>3,
            'avr_mark_innovativeness'=>3,
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s",1661162736)
        ]);
        DB::table('posts')->insert([
            'title'=>'Илюстрированая ыстория математики',
            'category'=>'literature',
            'pathFile'=>'files/3/Dzhexon_T_-_Matematika_Illyustrirovannaya_istoria_-_Illyustrirovannaya_entsiklopedia_nauki_-_2017.pdf',
            'user_id'=>'3',
            'avr_mark_complexity'=>3,
            'avr_mark_creativity'=>2,
            'avr_mark_innovativeness'=>4,
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s",1641808086)
        ]);
        DB::table('posts')->insert([
            'title'=>'Neoni - MACHINE',
            'category'=>'music',
            'pathFile'=>'sounds/3/Neoni_-_MACHINE_(musmore.com).mp3',
            'user_id'=>'3',
            'avr_mark_complexity'=>5,
            'avr_mark_creativity'=>5,
            'avr_mark_innovativeness'=>5,
            'rating'=>5,
            'created_at' => date("Y-m-d H:i:s",1644563779)
        ]);
        DB::table('posts')->insert([
            'title'=>'Halloween',
            'category'=>'art',
            'pathFile'=>'images/3/peakpx.jpg',
            'user_id'=>'3',
            'avr_mark_complexity'=>2,
            'avr_mark_creativity'=>3,
            'avr_mark_innovativeness'=>4,
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s",1652424658)
        ]);
        DB::table('posts')->insert([
            'title'=>'Чистая архитектура',
            'category'=>'literature',
            'pathFile'=>'files/4/Chistaia-arkhitiektura.-Iskusstvo-razrabotki-proghrammnogho-obiespiechieniia-Martin-R_.pdf',
            'user_id'=>'4',
            'avr_mark_complexity'=>4,
            'avr_mark_creativity'=>5,
            'avr_mark_innovativeness'=>3,
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s",1650342212)
        ]);
        DB::table('posts')->insert([
            'title'=>'maroon 5 feat future - cold',
            'category'=>'music',
            'pathFile'=>'sounds/4/maroon-5-feat-future-cold(mp3bit.cc).mp3',
            'user_id'=>'4',
            'avr_mark_complexity'=>4,
            'avr_mark_creativity'=>5,
            'avr_mark_innovativeness'=>4,
            'rating'=>4.3,
            'created_at' => date("Y-m-d H:i:s",1645049792)
        ]);
        DB::table('posts')->insert([
            'title'=>'Cat',
            'category'=>'art',
            'pathFile'=>'images/4/49565-kot_schit_mech.jpg',
            'user_id'=>'4',
            'avr_mark_complexity'=>4,
            'avr_mark_creativity'=>4,
            'avr_mark_innovativeness'=>5,
            'rating'=>4.3,
            'created_at' => date("Y-m-d H:i:s",1660191817)
        ]);
        DB::table('posts')->insert([
            'title'=>'Илон Маск',
            'category'=>'literature',
            'pathFile'=>'files/2/Elon_Mask_Tesla_SpaceX_i_doroga_v_buduschee pdf.pdf',
            'user_id'=>'2',
            'avr_mark_complexity'=>3,
            'avr_mark_creativity'=>5,
            'avr_mark_innovativeness'=>4,
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s",1662909167)
        ]);
        DB::table('posts')->insert([
            'title'=>'Panic! At the Disco - Emperors New Clothes',
            'category'=>'music',
            'pathFile'=>'sounds/3/Panic! At the Disco - Emperors New Clothes.mp3',
            'user_id'=>'3',
            'created_at' => date("Y-m-d H:i:s",1650213097)
        ]);
        DB::table('posts')->insert([
            'title'=>'dark',
            'category'=>'art',
            'pathFile'=>'images/3/bmw_fary_podsvetka_137326_1920x1080.jpg',
            'user_id'=>'3',
            'created_at' => date("Y-m-d H:i:s",1649427249)
        ]);
    }
}
