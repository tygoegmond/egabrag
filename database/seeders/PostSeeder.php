<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => "Test Post",
            'body' => "Test Content",
            'post_category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => "Test Post 2",
            'body' => "Test Content",
            'post_category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => "Test Post 3",
            'body' => "Test Content",
            'post_category_id' => 1,
            'user_id' => 1
        ]);
    }
}
