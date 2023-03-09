<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'fathimah@gmail.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Petugas',
               'email'=>'petugas@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];

        // $masyarakat = [
        //     [
        //     'id_user', => 1
        //     'nik', => ''
        //     'nama',
        //     'username',
        //     'password',
        //     'telp'
        //     ]
        // ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
