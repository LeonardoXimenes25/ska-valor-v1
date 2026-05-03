<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'updated_at' => now(),
            'created_at' => now(),
        ]
);
    }
}
