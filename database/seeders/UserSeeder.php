<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create initial known user
        User::create([
            'name' => env('ADMIN_USER', 'Admin User'),
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'email_verified_at' => now(),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            'remember_token' => Str::random(10),
        ]);
    }
}
