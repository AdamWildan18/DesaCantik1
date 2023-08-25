<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'DesaCantik',
               'email'=>'DesaCantik@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('DesaCantik'),
            ],
            [
               'name'=>'AdamWildan',
               'email'=>'adam@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('adam1234'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
