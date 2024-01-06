<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // $table->id('article_id');
    // $table->integer('user_id');
    // $table->string('title', 255);
    // $table->text('content');
    // $table->integer('category_id');
    // $table->dateTime('submission_date');
    // $table->boolean('is_approved');
    protected $primaryKey = 'article_id';
    protected $fillable = [
        'user_id', 'title', 'content', 'category_id', 'submission_date', 'is_approved'
    ];
}
