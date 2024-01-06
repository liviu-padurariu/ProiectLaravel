<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.ro',
                'role_id' => 1,
                'password' => '12345678'
            ]
        ];


        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
