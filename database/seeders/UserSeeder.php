<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "name"=> "Admin",
            "email"=> "admin@gmail.com",
            "password"=> Hash::make("admin1234"),
            "role"=> "admin",
        ]);

        //
        User::create([
            "name"=> "User",
            "email"=> "user@gmail.com",
            "password"=> Hash::make("user123"),
            "role"=> "user",
        ]);
    }
}
