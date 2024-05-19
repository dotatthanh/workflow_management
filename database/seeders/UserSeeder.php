<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Tạo admin
        User::truncate();
        User::create([
            'id' => 1,
            'code' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'name' => 'Admin',
            'birthday' => '1995-02-28',
            'phone_number' => '0123123123',
            'address' => 'Hà Nội',
            'gender' => 'Nam',
        ]);
    }
}