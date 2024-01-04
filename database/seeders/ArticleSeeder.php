<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        // protected $fillable = [
        //     'user_id', 'title', 'content', 'category_id', 'submission_date', 'is_approved'
        // ];
        $articles = [
            [
                'user_id' => 1,
                'title' => 'Exemplu Titlu',
                'content' => 'Exemplu continut',
                'category_id' => 1,
                'submission_date' => $dateNow,
                'is_approved' => true
            ]
        ];


        foreach ($articles as $key => $value) {
            Article::create($value);
        }
    }
}
