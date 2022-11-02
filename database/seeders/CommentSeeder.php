<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => '2',
            'post_id' => '2',
            'text' => Str::random(20),
        ]);
        DB::table('comments')->insert([
            'user_id' => '3',
            'post_id' => '4',
            'text' => Str::random(20),
        ]);
        DB::table('comments')->insert([
            'user_id' => '4',
            'post_id' => '3',
            'text' => Str::random(20),
        ]);
        DB::table('comments')->insert([
            'user_id' => '2',
            'post_id' => '2',
            'text' => Str::random(20),
        ]);
        DB::table('comments')->insert([
            'user_id' => '3',
            'post_id' => '5',
            'text' => Str::random(20),
        ]);
    }
}
