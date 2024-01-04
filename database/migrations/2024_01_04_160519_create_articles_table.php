<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    // CREATE TABLE `Articles` (
    //     `article_id` int(11) NOT NULL,
    //     `user_id` int(11) DEFAULT NULL,
    //     `title` varchar(255) NOT NULL,
    //     `content` text NOT NULL,
    //     `category_id` int(11) DEFAULT NULL,
    //     `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    //     `is_approved` tinyint(1) DEFAULT '0'
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->integer('user_id');
            $table->string('title', 255);
            $table->text('content');
            $table->integer('category_id');
            $table->dateTime('submission_date');
            $table->boolean('is_approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
