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
        \App\User::create([
            'username'      =>  'lentrix',
            'fullname'      =>  'Benjie B. Lenteria',
            'designation'   =>  'Systems Administrator',
            'password'      =>  bcrypt('password123'),
            'scope'         =>  'all'
        ]);
    }
}
