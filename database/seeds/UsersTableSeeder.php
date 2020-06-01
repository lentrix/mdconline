<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'username'      =>  'lentrix',
                'fullname'      =>  'Benjie B. Lenteria',
                'designation'   =>  'Systems Administrator',
                'password'      =>  bcrypt('password123'),
                'scope'         =>  'all'
            ],
            [
                'username'      =>  'finance',
                'fullname'      =>  'Finance Personel',
                'designation'   =>  'Finance Personel',
                'password'      =>  bcrypt('password123'),
                'scope'         =>  'finance'
            ],
            [
                'username'      =>  'registrar',
                'fullname'      =>  'Registrar Personel',
                'designation'   =>  'Registrar Personel',
                'password'      =>  bcrypt('password123'),
                'scope'         =>  'registrar'
            ],
            [
                'username'      =>  'coe',
                'fullname'      =>  'COE Dean',
                'designation'   =>  'COE Dean',
                'password'      =>  bcrypt('password123'),
                'scope'         =>  'COE'
            ],
            [
                'username'      =>  'cast',
                'fullname'      =>  'CAST Dean',
                'designation'   =>  'CAST Dean',
                'password'      =>  bcrypt('password123'),
                'scope'         =>  'CAST'
            ],
        ];

        foreach($users as $user) {
            \App\User::create($user);
        }
    }
}
