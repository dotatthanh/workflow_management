<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
