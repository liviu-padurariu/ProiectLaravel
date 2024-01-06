<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'ADMIN',
            ],
            [
                'name' => 'EDITOR',
            ],
            [
                'name' => 'JOURNALIST',
            ],
            [
                'name' => 'READER',
            ],
        ];


        foreach ($roles as $key => $value) {
            Roles::create($value);
        }
    }
}
