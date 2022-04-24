<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Post::factory()
            ->count(2)
            ->forCategory([
                'name' => 'Personal'
            ]))
            ->create();
        
        User::factory()
            ->has(Post::factory()
            ->count(2)
            ->forCategory([
                'name' => 'Work'
            ]))
            ->create();

        User::factory()
            ->has(Post::factory()
            ->count(2)
            ->forCategory([
                'name' => 'Home'
            ]))
            ->create();
        
            Post::factory()
            ->count(2)
            ->forAuthor([
                'username' => 'skiles.wade'
            ])
            ->create();
            
        $posts = Post::factory(10)->create();
        $tags = Tag::factory(5)->create();
        foreach ($posts as $post) {
            $post->tags()->sync(Tag::all()->random(random(1,5)));
        }
        
    }
}
