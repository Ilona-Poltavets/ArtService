<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            'user_id'=>'5',
            'post_id'=>'1',
            'mark_complexity'=>'1',
            'mark_creativity'=>'5',
            'mark_innovativeness'=>'2',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'5',
            'post_id'=>'2',
            'mark_complexity'=>'3',
            'mark_creativity'=>'4',
            'mark_innovativeness'=>'2',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'5',
            'post_id'=>'3',
            'mark_complexity'=>'3',
            'mark_creativity'=>'3',
            'mark_innovativeness'=>'3',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'6',
            'post_id'=>'4',
            'mark_complexity'=>'3',
            'mark_creativity'=>'2',
            'mark_innovativeness'=>'4',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'6',
            'post_id'=>'5',
            'mark_complexity'=>'5',
            'mark_creativity'=>'5',
            'mark_innovativeness'=>'5',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'6',
            'post_id'=>'6',
            'mark_complexity'=>'2',
            'mark_creativity'=>'3',
            'mark_innovativeness'=>'4',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'7',
            'post_id'=>'7',
            'mark_complexity'=>'4',
            'mark_creativity'=>'5',
            'mark_innovativeness'=>'3',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'7',
            'post_id'=>'8',
            'mark_complexity'=>'4',
            'mark_creativity'=>'5',
            'mark_innovativeness'=>'4',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'7',
            'post_id'=>'9',
            'mark_complexity'=>'4',
            'mark_creativity'=>'4',
            'mark_innovativeness'=>'5',
            'review'=>Str::random(50),
        ]);
        DB::table('rates')->insert([
            'user_id'=>'5',
            'post_id'=>'10',
            'mark_complexity'=>'3',
            'mark_creativity'=>'5',
            'mark_innovativeness'=>'4',
            'review'=>Str::random(50),
        ]);
    }
}
