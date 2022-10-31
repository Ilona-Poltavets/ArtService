<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name'=>'Write comments',
            'label'=>'write_comments'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Add post',
            'label'=>'add_post'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Add expert',
            'label'=>'add_expert'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Can rate',
            'label'=>'can_rate'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Write reviews',
            'label'=>'write_reviews'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit expert profile',
            'label'=>'edit_expert_profile'
        ]);
        DB::table('permissions')->insert([
            'name'=>'See rate',
            'label'=>'see_rate'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Delete expert',
            'label'=>'delete_expert'
        ]);
        DB::table('permissions')->insert([
            'name'=>'See the number of expert reviews',
            'label'=>'see_the_number_of_expert_reviews'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Change category for expert',
            'label'=>'change_category_expert'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit author profile',
            'label'=>'edit_author_profile'
        ]);
        DB::table('permissions')->insert([
            'name'=>'Edit admin profile',
            'label'=>'edit_admin_profile'
        ]);
    }
}
