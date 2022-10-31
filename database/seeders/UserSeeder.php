<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::where('label','admin')->first();
        $author=Role::where('label','author')->first();
        $expert=Role::where('label','expert')->first();

        $user1=new User();
        $user1->name='admin';
        $user1->surname='admin';
        $user1->bday='2002-04-28';
        $user1->gender='female';
        $user1->email='admin@gmail.com';
        $user1->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user1->save();
        $user1->roles()->attach($admin);

        $user2=new User();
        $user2->name='author';
        $user2->surname='test';
        $user2->bday='1999-02-28';
        $user2->gender='male';
        $user2->email='author_mark2@gmail.com';
        $user2->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user2->save();
        $user2->roles()->attach($author);

        $user3=new User();
        $user3->name='expert';
        $user3->surname='test';
        $user3->bday='2000-06-06';
        $user3->gender='other';
        $user3->email='expert007@gmail.com';
        $user3->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user3->save();
        DB::table('experts')->insert([
            'user_id'=>$user3->id,
            'nationality'=>'Ukrainian',
            'phone_number'=>'380123456789',
            'category'=>'arts',
        ]);
        $user3->roles()->attach($expert);

    }
}
