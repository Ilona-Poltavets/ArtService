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
        $user2->bday='1989-02-28';
        $user2->gender='male';
        $user2->email='random@gmail.com';
        $user2->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user2->save();
        $user2->roles()->attach($author);

        $user4=new User();
        $user4->name='author1';
        $user4->surname='test1';
        $user4->bday='1979-02-28';
        $user4->gender='male';
        $user4->email='author_random@gmail.com';
        $user4->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user4->save();
        $user4->roles()->attach($author);

        $user5=new User();
        $user5->name='author2';
        $user5->surname='test2';
        $user5->bday='1999-02-28';
        $user5->gender='male';
        $user5->email='author_mark2@gmail.com';
        $user5->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user5->save();
        $user5->roles()->attach($author);

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
            'category'=>'art',
        ]);
        $user3->roles()->attach($expert);

        $user6=new User();
        $user6->name='expert1';
        $user6->surname='test1';
        $user6->bday='2000-06-06';
        $user6->gender='other';
        $user6->email='hitman@gmail.com';
        $user6->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user6->save();
        DB::table('experts')->insert([
            'user_id'=>$user6->id,
            'nationality'=>'USA',
            'phone_number'=>'380123456789',
            'category'=>'literature',
        ]);
        $user6->roles()->attach($expert);

        $user7=new User();
        $user7->name='expert2';
        $user7->surname='test2';
        $user7->bday='2000-06-06';
        $user7->gender='other';
        $user7->email='expert047@gmail.com';
        $user7->password=password_hash('testPassword' , PASSWORD_BCRYPT);
        $user7->save();
        DB::table('experts')->insert([
            'user_id'=>$user3->id,
            'nationality'=>'British',
            'phone_number'=>'380123456789',
            'category'=>'music',
        ]);
        $user7->roles()->attach($expert);
    }
}
