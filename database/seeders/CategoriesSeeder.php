<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Artistic',
            ],
            [
                'name' => 'Tehnic',
            ],
            [
                'name' => 'Science',
            ],
            [
                'name' => 'Fashion',
            ]
        ];


        foreach ($categories as $key => $value) {
            Categories::create($value);
        }
    }
}
