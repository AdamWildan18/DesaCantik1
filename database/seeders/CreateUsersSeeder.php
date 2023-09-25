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
                'role'=>'superadmin',
                'address'=>'Pemkot',
               'password'=> bcrypt('DesaCantik'),
            ],
            [
               'name'=>'AdminCibabat',
               'email'=>'admincibabat@gmail.com',
                'role'=>'admin',
                'address'=>'Cibabat',
               'password'=> bcrypt('12345678'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
