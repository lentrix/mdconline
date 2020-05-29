<?php

use App\Enrol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EnrolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'student_id' => 413,
                'email' => 'jrba@gmail.com',
                'phone' => '1234567890',
                'program' => 'BEED',
                'level' => 3,
                'code' => Str::random(8)
            ],

            [
                'student_id' => 620,
                'email' => 'elisaleonor@yahoo.com',
                'phone' => '1234567890',
                'program' => 'BSHM',
                'level' => 2,
                'code' => Str::random(8)
            ],
            [
                'student_id' => 1080,
                'email' => 'geraldinecirunay@gmail.com',
                'phone' => '1234567890',
                'program' => 'BSN',
                'level' => 1,
                'code' => Str::random(8)
            ],
            [
                'student_id' => 1905,
                'email' => 'arambala@yahoo.com.ph',
                'phone' => '1234567890',
                'program' => 'BSCrim',
                'level' => 3,
                'code' => Str::random(8)
            ],

        ];

        foreach($seeds as $seed) {
            Enrol::create($seed);
        }
    }
}
