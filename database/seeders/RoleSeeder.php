<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=new Role();
        $role1->name='admin';
        $role1->label='admin';
        $role1->save();
        $role1->permissions()->attach(Permission::where('label','add_expert')->first());
        $role1->permissions()->attach(Permission::where('label','delete_expert')->first());
        $role1->permissions()->attach(Permission::where('label','see_the_number_of_expert_reviews')->first());
        $role1->permissions()->attach(Permission::where('label','see_rate')->first());
        $role1->permissions()->attach(Permission::where('label','change_category_expert')->first());
        $role1->permissions()->attach(Permission::where('label','edit_expert_profile')->first());
        $role1->permissions()->attach(Permission::where('label','edit_author_profile')->first());
        $role1->permissions()->attach(Permission::where('label','edit_admin_profile')->first());

        $role2=new Role();
        $role2->name='expert';
        $role2->label='expert';
        $role2->save();
        $role2->permissions()->attach(Permission::where('label','write_comments')->first());
        $role2->permissions()->attach(Permission::where('label','can_rate')->first());
        $role2->permissions()->attach(Permission::where('label','write_reviews')->first());
        $role2->permissions()->attach(Permission::where('label','edit_expert_profile')->first());
        $role2->permissions()->attach(Permission::where('label','see_rate')->first());

        $role3=new Role();
        $role3->name='author';
        $role3->label='author';
        $role3->save();
        $role3->permissions()->attach(Permission::where('label','write_comments')->first());
        $role3->permissions()->attach(Permission::where('label','add_post')->first());
        $role3->permissions()->attach(Permission::where('label','edit_author_profile')->first());
        $role3->permissions()->attach(Permission::where('label','see_rate')->first());
    }
}
