<?php

namespace Database\Seeders;

use App\Models\UserCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userCategories = [
            [
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
            ]
        ];


        foreach ($userCategories as $key => $value) {
            UserCategories::create($value);
        }
    }
}
